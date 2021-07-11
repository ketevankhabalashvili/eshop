<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $usersQuery = User::query()->latest();
        $usersQuery = $this->filter($usersQuery);
        $users = $usersQuery->paginate(100);


        return view('admin.users.list')->with('users',$users);
    }

    /**
     * Filter a query.
     *
     * @return $usersQuery
     */
    private function filter($usersQuery)
    {
            return $usersQuery
                ->when(request('id'), function ($q) {
                    $q->where('id', 'LIKE', request('id'));
                })
                ->when(request('name'), function ($q) {
                    $q->where('name', 'LIKE', '%' . request('name') . '%');
                })
                ->when(request('email'), function ($q) {
                    $q->where('email', 'LIKE', '%' . request('email') . '%');
                })
                ->when(request('permission'), function ($q) {
                    $q->where('permission', 'LIKE', '%' . request('permission') . '%');
                })
                ->when(request('birth_date'), function ($q) {
                    $q->where('birth_date', 'LIKE', '%' . request('birth_date') . '%');
                })
                ->when(request('created_at'), function ($q) {
                    $q->where('created_at', 'LIKE', '%' . request('created_at') . '%');
                })
                ->when(request('updated_at'), function ($q) {
                    $q->where('updated_at', 'LIKE', '%' . request('updated_at') . '%');
                });
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.view')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.update')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'permission' => 'required|string|max:255',
            'birth_date' => 'nullable|date|max:255',
            'phone' => 'nullable|string|max:25|regex:/^[0-9]+$/',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048'
        ]);


        $user->name = $request->input('name');
        $user->permission = $request->input('permission');
        $user->birth_date = $request->input('birth_date');
        $user->phone = $request->input('phone');

        if ($request->hasFile('profile_image'))
        {
            if ($user->profile_image != 'default/avatar.png') {
                File::delete(public_path("images/" . $user->profile_image));
            }
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = 'uploaded_avatars/' . time() . '.' . $extension;
            $file->move('images/uploaded_avatars/', $filename);
            $user->profile_image = $filename;

        }
        else
        {
            $user->profile_image = $user->profile_image;
        }

        $user->update();

        return redirect('/superadmin/users')->with('status', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_image != 'default/avatar.png') {
            File::delete(public_path("images/" . $user->profile_image));
        }
        $user->delete();



        return redirect()->route('admin.users.index')->with('status', 'Deleted successfully');
    }
}
