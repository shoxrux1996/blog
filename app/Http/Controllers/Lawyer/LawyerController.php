<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Support\Facades\Hash;


use Webpatser\Countries\CountriesFacade;
use yuridik\Education;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Lawyer;
use yuridik\File;
use yuridik\Category;
use Validator;
use Illuminate\Support\Facades\File as LaraFile;
use Session;

class LawyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }

    public function index()
    {
        $lawyer = Auth::user();
        return view('lawyer.dashboard')->withLawyer($lawyer);
    }

    public function info($type = 'main')
    {

        $lawyer = Auth::user();
        $categories = Category::where('category_id', null)->get();
        $city = City::all();
        $cities = array();
        $countries =CountriesFacade::getList();


        foreach ($city as $key) {
            $cities[$key->id] = $key->name;
        }
        return view('lawyer.info')
                ->withSettingtype($type)
                ->withLawyer($lawyer)
                ->withCities($cities)
                ->withCategories($categories)
                ->withCountries($countries);
    }

    public function update(Request $request, $settingtype)
    {
        $lawyer = Auth::user();
        if ($settingtype === "main") {
            if ($request->name !== null)
                $lawyer->user->firstName = $request->name;
            if ($request->surname !== null)
                $lawyer->user->lastName = $request->surname;
            if ($request->patronymic !== null)
                $lawyer->fatherName = $request->patronymic;
            $lawyer->job_status = $request->job_status;
            $lawyer->gender = $request->gender;
            $lawyer->user->dateOfBirth = $request->dateOfBirth;
            $lawyer->user->city_id = $request->city;
            $lawyer->push();
            return redirect()->route('lawyer.info', ['type' => 'main']);
        } elseif ($settingtype === "photo") {
            $messages = [
                'image' => 'Формат не поддерживается',
            ];
            $validator = Validator::make($request->all(),
                ['image' => 'image'], $messages);
            if ($validator->fails()) {
                return redirect()->route('lawyer.info', ['type' => 'photo'])->withErrors($validator);
            }
            if ($request->file('image') != null) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $upload_folder = '/lawyers/photo' . $lawyer->id . '/';
                if ($lawyer->user->file != null) {
                    LaraFile::delete(public_path() . $lawyer->user->file->path . $lawyer->user->file->file);
                    $lawyer->user->file->file = $file_name;
                    $lawyer->user->file->path = $upload_folder;
                    $lawyer->user->file->save();

                } else {
                    $fil = new File;
                    $fil->file = $file_name;
                    $fil->path = $upload_folder;

                    $lawyer->user->file()->save($fil);
                }
                $file->move(public_path() . $upload_folder, $file_name);
            }
            $lawyer->save();
            return redirect()->route('lawyer.info', ['type' => 'photo']);
        }
        elseif ($settingtype === "password") {
            if (Hash::check($request->current_password, $lawyer->password)) {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                    'string' => 'Неправильный формат',
                    'min' => 'Минимум 6 символов',
                    'confirmed' => 'Пароли не совпадают',
                ];
                $validator = Validator::make($request->all(),
                    ['new_password' => 'required|string|min:6|confirmed',], $messages);
                if ($validator->fails()) {
                    return redirect()->route('lawyer.info', ['type' => 'password'])->withErrors($validator);
                } else {
                    $lawyer->password = Hash::make($request->new_password);
                    $lawyer->save();
                    return redirect()->route('lawyer.info', ['type' => 'password']);
                }
            } else
                return redirect()->route('lawyer.info', ['type' => 'password'])->withErrors(['wrong-attempt' => 'Неправильный пароль']);
        } elseif ($settingtype === 'contacts') {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'regex' => 'Неправильный формат',
            ];
            $validator = Validator::make($request->all(),
                ['phone' => 'required',], $messages);
            if ($validator->fails()) {
                return redirect()->route('lawyer.info', ['type' => 'contacts'])->withErrors($validator);
            } else {
                $lawyer->user->phone = $request->phone;
                $lawyer->user->save();
                return redirect()->route('lawyer.info', ['type' => 'contacts']);
            }
        }
        elseif ($settingtype === 'experience') {
            $lawyer->categories()->detach();
            $lawyer->categories()->sync($request->specialization, false);
            if ($request->company !== null || $request->position !== null) {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                ];
                $validator = Validator::make($request->all(),
                    ['position' => 'required', 'company' => 'required',], $messages);
                if ($validator->fails()) {
                    return redirect()->route('lawyer.info', ['type' => 'experience'])->withErrors($validator);
                } else {
                    $lawyer->company = $request->company;
                    $lawyer->position = $request->position;
                    $lawyer->push();
                }
            }
            if ($request->experience_year === null)
                $lawyer->experience_year = 0;
            else {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                    'integer' => 'Неверный формат',
                    'between' => 'Неподходящий число'
                ];
                $validator = Validator::make($request->all(),
                    ['experience_year' => 'required|integer|between:0,99',], $messages);
                if ($validator->fails()) {
                    return redirect()->route('lawyer.info', ['type' => 'experience'])->withErrors($validator);
                } else {
                    $lawyer->experience_year = $request->experience_year;
                    $lawyer->push();
                    return redirect()->route('lawyer.info', ['type' => 'experience']);
                }
            }
            return redirect()->route('lawyer.info', ['type' => 'experience']);
        } elseif ($settingtype === 'additional') {
            $messages = [
                'integer' => 'Неверный формат',
                'between' => 'Неподходящий число'
            ];
            $validator = Validator::make($request->all(), [
                'call_price' => 'integer|between:0,20000',
                'doc_price' => 'integer|between:0,50000',], $messages);
            if ($validator->fails()) {
                return redirect()->route('lawyer.info', ['type' => 'additional'])->withErrors($validator);
            } else {
                if ($request->call_price !== null)
                    $lawyer->call_price = $request->call_price;
                else
                    $lawyer->call_price = 0;
                if ($request->doc_price !== null)
                    $lawyer->doc_price = $request->doc_price;
                else
                    $lawyer->doc_price = 0;
                $lawyer->profile_shown_price = $request->profile_shown_price;
                $lawyer->about_me = $request->about_me;
                $lawyer->push();
                return redirect()->route('lawyer.info', ['type' => 'additional']);
            }
        }
        elseif ($settingtype === 'awards') {
            $messages = [
                'image' => 'Неверный формат',
            ];
            $rules = array();
            $count = count($request->file('files')) - 1;

            foreach (range(0, $count) as $i) {
                $rules['files.' . $i] = 'image';
            }
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect()->route('lawyer.info', ['type' => 'awards'])->withErrors($validator);
            } else {
                if ($request->file('files') != null) {
                    $file = $request->file('files');
                    foreach ($file as $key) {
                        $fil = new File;
                        $fil->file = $key->getClientOriginalName();
                        $upload_folder = '/awards/lawyer' . $lawyer->id . '/';
                        $fil->path = $upload_folder;
                        $lawyer->files()->save($fil);
                        $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
                    }
                }
                return redirect()->route('lawyer.info', ['type' => 'awards']);
            }
        }elseif ($settingtype === 'education') {

            $rules = array(
                'city'=>'required',
                'university'=>'required',
                'faculty'=>'required',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->route('lawyer.info', ['type' => 'education'])->withErrors($validator);
            }
            $education = new Education;
            $education->country_id = $request->country;
            $education->city = $request->city;
            $education->university =$request->university;
            $education->faculty =$request->faculty;
            $education->year = $request->year;
            $education->lawyer_id = $lawyer->id;
            $education->save();

            return redirect()->route('lawyer.info', ['type' => 'education']);
        }
        else {
            return redirect()->route('lawyer.info');
        }

    }
    public function educationDelete($id){
        $lawyer = Auth::user();
        $education = Education::findOrFail($id);
        if($lawyer->id != $education->lawyer_id){
            return redirect()->back();
        }
        $education->delete();
        return redirect()->route('lawyer.info', ['type' => 'education']);
    }
    public function awardDelete($id)
    {
        $lawyer = Auth::user();
        $file = File::findOrFail($id);
        if($lawyer->id != $file->fileable->lawyer->id && $file->fileable_type != 'yuridik\Lawyer'){
            return redirect()->back();
        }

        LaraFile::delete(public_path() . $file->path . $file->file);
        $file->delete();
        return redirect()->route('lawyer.info', ['type' => 'awards']);
    }
    public function fileDelete($id)
    {
        $lawyer = Auth::user();

        $file = File::findOrFail($id);

        if($lawyer->id != $file->fileable->lawyer->id && $file->fileable_type != 'yuridik\Answer'){
            return redirect()->back();
        }
        LaraFile::delete(public_path() . $file->path . $file->file);
        $file->delete();
        return redirect()->back();
    }
}
