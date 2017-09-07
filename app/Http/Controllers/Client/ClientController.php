<?php

namespace yuridik\Http\Controllers\Client;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Client;
use yuridik\File;
use Session;
use Validator;
use Illuminate\Support\Facades\File as LaraFile;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        $client = Auth::user();
        return view('client.dashboard')->withClient($client);
    }

    public function info($type = 'main')
    {
        $client = Auth::user();
        $city = City::all();
        $cities = array();
        foreach ($city as $key) {
            $cities[$key->id] = $key->name;
        }
        return view('client.info')->withSettingtype($type)->withClient($client)->withCities($cities);
    }

    public function update(Request $request, $settingtype)
    {
        $client = Auth::user();
        $city = City::all();
        $cities = array();
        foreach ($city as $key) {
            $cities[$key->id] = $key->name;
        }
        if ($settingtype === "main") {

            if ($request->name !== null)
                $client->user->firstName = $request->name;
            if ($request->surname !== null)
                $client->user->lastName = $request->surname;
            $client->gender = $request->gender;
            $client->user->dateOfBirth = $request->dateOfBirth;
            $client->user->city_id = $request->city;
            $client->push();
            return redirect()->route('client.info',['type' =>'main']);
        } elseif ($settingtype === "photo") {
            $messages = [
                'image' => 'Формат не поддерживается',
                'mimes' => 'Формат не поддерживается',
                'max' => 'Размер слишком велик',
            ];
            $validator = Validator::make($request->all(),
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',], $messages);
            if ($validator->fails()) {
                return redirect()->route('client.info',['type' =>'photo'])->withErrors($validator);
            }
            if ($request->file('image') != null) {
                $file = $request->file('image');
                $file_name = $file->getClientOriginalName();
                $upload_folder = '/clients/photo' . $client->id . '/';
                if ($client->user->file != null) {
                    LaraFile::delete(public_path() . $client->user->file->path . $client->user->file->file);
                    $client->user->file->file = $file_name;
                    $client->user->file->path = $upload_folder;
                    $client->user->file->save();
                } else {
                    $fil = new File;
                    $fil->file = $file_name;
                    $fil->path = $upload_folder;

                    $client->user->file()->save($fil);
                }
                $file->move(public_path() . $upload_folder, $file_name);
            }
            $client->push();
            return redirect()->route('client.info',['type' =>'photo']);
        } else {
            if (Auth::attempt(['email' => $client->email, 'password' => $request->current_password])) {
                $messages = [
                    'required' => 'Обязательно к заполнению',
                    'string' => 'Неправильный формат',
                    'min' => 'Минимум 6 символов',
                    'confirmed' => 'Пароли не совпадают',
                ];
                $validator = Validator::make($request->all(),
                    ['new_password' => 'required|string|min:6|confirmed',], $messages);
                if ($validator->fails()) {
                    return redirect()->route('client.info',['type' =>'privacy'])->withErrors($validator);
                } else {
                    $client->password = bcrypt($request->new_password);
                    $client->push();
                    return redirect()->route('client.info',['type' =>'privacy']);
                }
            } else
                return redirect()->route('client.info',['type' =>'privacy'])->withErrors(['wrong-attempt' => 'Неправильный пароль']);
        }


        //    if($request->file('image') != null) {
        //        $file = $request->file('image');
        //        $file_name = $file->getClientOriginalName();
        //        $upload_folder = '/clients/photo'.$client->id.'/';
        //        if($client->user->file != null){
        //        LaraFile::delete(public_path().$upload_folder.$client->user->file->file);
        //            $client->user->file->file = $file_name;
        //            $client->user->file->path = $upload_folder;

        //        }
        //        else{
        //            $fil = new File;
        //            $fil->file = $file_name;
        //            $fil->path = $upload_folder;

        //            $client->user->file()->save($fil);
        //        }
        //        $file->move(public_path() . $upload_folder, $file_name);
        //    }            
        //    $client->push();
        // Session::flash('message', 'Your account updated successfully');


    }

}
