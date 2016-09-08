<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Attachment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:120',
            'email' => 'required|email',
            'pob' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'number_of_children' => 'numeric',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'last_education' => 'required',
        ], [
            'name.required' => 'We need to know your name, Please fill out the field..',
            'email.required' => 'We need to know your e-mail address, Please fill out the field..',
            'pob.required' => 'We need to know your place of birth, Please fill out the field..',
            'dob.required' => 'We need to know your date of birth, Please fill out the field..',
            'religion.required' => 'We need to know your religion, Please fill out the field..',
            'gender.required' => 'We need to know your gender, Please fill out the field..',
            'marital_status.required' => 'We need to know your marital status, Please fill out the field..',
            'number_of_children.required' => 'Number of child must be numeric, Please fill properly',
            'address.required' => 'We need to know your address, Please fill out the field..',
            'phone_number.required' => 'We need to know your phone number, Please fill out the field..',
            'last_education.required' => 'We need to know your last education, Please fill out the field..',
        ])->validate();

        $userprofile = User::findOrFail($id);
        $userprofile->name = $request['name'];
        $userprofile->email = $request['email'];
        $userprofile->pob = $request['pob'];
        $userprofile->dob = $request['dob'];
        $userprofile->religion = $request['religion'];
        $userprofile->gender = $request['gender'];
        $userprofile->marital_status = $request['marital_status'];
        $userprofile->number_of_children = $request['number_of_children'];
        $userprofile->address = $request['address'];
        $userprofile->phone_number = $request['phone_number'];
        $userprofile->last_education = $request['last_education'];
        $userprofile->id_no = $request['id_no'];
        $userprofile->tax_no = $request['tax_no'];
        if($userprofile->save()){
            return redirect()->back()->with('success', 'Profile has been updated..');
        }else{
            return redirect()->back()->with('info', 'Nothing is change..');
        }

    }

    public function updateProfilePicture(Request $request, $id)
    {
        Validator::make($request->all(), [
            'foto' => 'required|mimes:jpg,png,gif,jpeg|max:11000',
        ], [
            'foto.required' => 'We need to know your profile picture, Please fill out the field..',
        ])->validate();
        $profilepicture = User::findOrFail($id);
        if ($request->hasFile('foto')) {
            unlink(public_path('/assets/images/users/' . $profilepicture->foto));
            $foto = $request->file('foto');
            $filename = $profilepicture->name . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->resize(380, 380)->save(public_path('/assets/images/users/' . $filename));
            $profilepicture->foto = $filename;
            if($profilepicture->save()){
                return redirect()->back()->with('success', 'Profile picture has been updated..');
            }else{
                return redirect()->back()->with('info', 'Nothing is change..');
            }
        }
    }

    public function updatePassword(Request $request, $id){
        Validator::make($request->all(), [
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'current_password' => 'required'
        ], [
            'password.required' => 'We need to know your new password, Please fill out the field..',
            'password_confirmation.required' => 'We need to know password confirmation, Please fill out the field..',
            'current_password.required' => 'We need to know your current password, Please fill out the field..',
        ])->validate();
        $password = User::findOrFail($id);
        if (Hash::check($request['current_password'], $password->password)){
            $password->password = bcrypt($request['password']);
            $password->save();
            return redirect()->back()->with('success', 'Your password has been updated..');
        }
        return redirect()->back()->with('info', 'Nothing is change..');
    }

    public function uploadUserAttachment(Request $request){
        $attachment=New Attachment();
        Validator::make($request->all(), [
            'title_attachment' => 'required',
            'attachment_file' => 'required|max:11000',
        ], [
            'title_attachment.required' => 'We need to know title, Please fill out the field..',
            'attachment_file.required' => 'We need to know file attachment, Please fill out the field..',
        ])->validate();
        if ($request->hasFile('attachment_file')) {
            for ($i = 0; $i < count($request['title_attachment']); $i++) {
                $foto = $request->file('attachment_file')[$i];
                $filename =$request['title_attachment'][$i] .'.'. Auth::user()->name. '.' . $foto->getClientOriginalExtension();
                Image::make($foto)->save(public_path('/assets/images/attachments/'. $filename));
                $data = array(
                    'title' => $request['title_attachment'][$i],
                    'file'  => $filename,
                    'foreign_id' => Auth::user()->id
                );
                DB::table('attachments')->insert($data);
            }
            return redirect()->back()->with('success', 'Attachments has been uploaded..');
        }
        return redirect()->back()->with('info', 'Nothing is change..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
