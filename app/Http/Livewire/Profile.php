<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends BaseComponent
{
    use WithFileUploads;

    public $photo;

    public $fullName;
    public $phone;
    public $companyName;
    public $password;
    public $password_confirm;
    public $user;
    public $profilePic;
    
    protected $listeners=['refreshComponent'=>'$refresh'];


    public function render()
    {
        return view('livewire.profile');
    }

    public function mount()
    {
        $this->user = auth()->user();
        $this->fullName = $this->user->name;
        $this->phone = $this->user->phone;
        $this->companyName = $this->user->company_name;

        if($this->user->profile_pic){
           $this->profilePic = true;
           Storage::disk('public')->get('profile-photos/'.$this->user->id."/".$this->user->profile_pic); 


        }

        
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024|dimensions:min_width=250,min_height=250', // 1MB Max
        ]);
        $this->showModal("success", "Photo updated", "Your profile picture is being updated");
        $picture = $this->photo->store('public/profile-photos/'.$this->user->id);

        $user = User::find(auth()->user()->id);
        $user->profile_pic = basename($picture);
        $user->save();
        $this->emit("refreshComponent");

    }


    public function submit()
    {
        $this->validate([
    'fullName'=>'required|string|min:3',
    'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
    'companyName'=>'string',
    
    ]);

        $user = User::find(auth()->user()->id);

        $user->name = $this->fullName;
        $user->phone = $this->phone;
        $user->company_name = $this->companyName;

        if ($this->password) {
            $this->validate(['password'=>'min:8',
            'password_confirm'=>'min:8|same:password']);
            $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->showModal("success", "Profile Updated", "Your profile information has been updated");
    }
}