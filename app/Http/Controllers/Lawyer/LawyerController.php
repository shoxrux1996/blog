<?php

namespace yuridik\Http\Controllers\Lawyer;

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

    public function info()
    {
        $lawyer = Auth::user();
        $categories = Category::where('category_id', null)->get();
        $city = City::all();
        $cities = array();
        foreach ($city as $key) {
            $cities[$key->id] = $key->name;
        }

        return view('lawyer.info')->withSettingtype('main')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
    }

    public function update(Request $request, $settingtype)
    {

        $lawyer = Auth::user();
        $city = City::all();
        $categories = Category::where('category_id', null)->get();
        $cities = array();
        foreach ($city as $key) {
            $cities[$key->id] = $key->name;
        }
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
            return view('lawyer.info')->withSettingtype('main')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
        } elseif ($settingtype === "photo") {
            $messages = [
                'image' => 'Формат не поддерживается',
                'mimes' => 'Формат не поддерживается',
                'max' => 'Размер слишком велик',
            ];
            $validator = Validator::make($request->all(),
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',], $messages);
            if ($validator->fails()) {
                return view('lawyer.info')->withSettingtype('photo')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
            }
            if ($request->file('image') != null) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $upload_folder = '/lawyers/photo' . $lawyer->id . '/';
                if ($lawyer->user->file != null) {
                    LaraFile::delete(public_path() . $upload_folder . $lawyer->user->file->file);
                    $lawyer->user->file->file = $file_name;
                    $lawyer->user->file->path = $upload_folder;

                } else {
                    $fil = new File;
                    $fil->file = $file_name;
                    $fil->path = $upload_folder;

                    $lawyer->user->file()->save($fil);
                }
                $file->move(public_path() . $upload_folder, $file_name);
            }
            $lawyer->push();
            return view('lawyer.info')->withSettingtype('photo')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
        } elseif ($settingtype === "password") {

            if (Auth::attempt(['email' => $lawyer->email, 'password' => $request->current_password])) {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                    'string' => 'Неправильный формат',
                    'min' => 'Минимум 6 символов',
                    'confirmed' => 'Пароли не совпадают',
                ];
                $validator = Validator::make($request->all(),
                    ['new_password' => 'required|string|min:6|confirmed',], $messages);
                if ($validator->fails()) {
                    return view('lawyer.info')->withSettingtype('password')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
                } else {
                    $lawyer->password = bcrypt($request->new_password);
                    $lawyer->push();
                    return view('lawyer.info')->withSettingtype('password')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
                }
            } else
                return view('lawyer.info')->withSettingtype('password')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors(['wrong-attempt' => 'Неправильный пароль']);
        } elseif ($settingtype === 'contacts') {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'regex' => 'Неправильный формат',
            ];
            $validator = Validator::make($request->all(),
                ['phone' => 'required',], $messages);
            if ($validator->fails()) {
                return view('lawyer.info')->withSettingtype('contacts')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
            } else {
                $lawyer->user->phone = $request->phone;
                $lawyer->push();
                return view('lawyer.info')->withSettingtype('contacts')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
            }
        } elseif ($settingtype === 'experience') {
            $lawyer->categories()->detach();
            $lawyer->categories()->sync($request->specialization, false);
            if ($request->company !== null || $request->position !== null) {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                ];
                $validator = Validator::make($request->all(),
                    ['position' => 'required', 'company' => 'required',], $messages);
                if ($validator->fails()) {
                    return view('lawyer.info')->withSettingtype('experience')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
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
                    return view('lawyer.info')->withSettingtype('experience')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
                } else {
                    $lawyer->experience_year = $request->experience_year;
                    $lawyer->push();
                }
            }

            return view('lawyer.info')->withSettingtype('experience')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
        } elseif ($settingtype === 'additional') {
            $messages = [
                'integer' => 'Неверный формат',
                'between' => 'Неподходящий число'
            ];
            $validator = Validator::make($request->all(), [
                'call_price' => 'integer|between:0,20000',
                'doc_price' => 'integer|between:0,50000',], $messages);
            if ($validator->fails()) {
                return view('lawyer.info')->withSettingtype('additional')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
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
                return view('lawyer.info')->withSettingtype('additional')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
            }
        } elseif ($settingtype === 'awards') {
            $messages = [
                'image' => 'Неверный формат',
                'mimes' => 'Неверный формат',
                'max' => 'Файл слишком велик',
            ];
            $rules = array();
            $count = count($request->file('files')) - 1;


            foreach (range(0, $count) as $i) {
                $rules['files.' . $i] = 'image|mimes:jpeg|max:3000';
            }
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return view('lawyer.info')->withSettingtype('awards')->withLawyer($lawyer)->withCities($cities)->withCategories($categories)->withErrors($validator);
            } else {
                if ($request->file('files') != null) {
                    $file = $request->file('files');
                    foreach ($file as $key) {
                        $fil = new File;
                        $fil->file = $key->getClientOriginalName();
                        $upload_folder = '/awards/' . time() . '/';
                        $fil->path = $upload_folder;
                        $lawyer->files()->save($fil);
                        $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
                    }
                }
                return view('lawyer.info')->withSettingtype('awards')->withLawyer($lawyer)->withCities($cities)->withCategories($categories);
            }
        }
    }
}
