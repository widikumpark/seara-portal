<div>
    <div class="">
        <h2>Edit Profile</h2>
        <div class="card">
            <div class="card-body">
                <div wire:loading wire:target="photo">
                    <div class="alert alert-primary" role="alert">
                        Uploading Photo
                    </div>
                </div>
                <div class="row px-5">
                    <div class="col-sm-3">
                        <!--left col-->


                        <div class="text-center">
                            @if ($profilePic)
                                <img src="{{ asset('storage/profile-photos/' . $user->id . '/' . $user->profile_pic) }}"
                                    class=" img-responsive img-rounded img-thumbnail " style="width:auto;height:250px;"
                                    alt="avatar">
                            @else
                                <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}"
                                    class="avatar img-responsive img-circle img-thumbnail" alt="avatar">
                            @endif
                            <h6 class="my-1">Change Picture</h6>
                            <input wire:model="photo" type="file" class="text-center center-block file-upload">
                            @error('photo') <span class="error text-red">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                    </div>
                    <!--/col-3-->
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div id="home">
                                <form wire:submit.prevent="submit" id="registrationForm">
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="fullName">
                                                    <h4>Full Name</h4>
                                                </label>
                                                <input value="lol" id="fullName" wire:model="fullName" name="fullName"
                                                    type="text"
                                                    class="form-control @error('fullName') is-invalid @enderror"
                                                    placeholder="Full name" required>
                                                @error('fullName') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="companyName">
                                                    <h4>Company Name</h4>
                                                </label>
                                                <input wire:model="companyName" type="text" name="companyName"
                                                    class="form-control" placeholder="Company Name">
                                                @error('companyName') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="phone">
                                                    <h4>Phone Number</h4>
                                                </label>
                                                <input wire:model="phone" type="phone" name="phone" class="form-control"
                                                    placeholder="Phone Number" required>
                                                @error('phone') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">

                                        <div class="row">
                                            <div class="col">
                                                <label for="password">
                                                    <h4>Password</h4>
                                                </label>
                                                <input wire:model="password" type="password" class="form-control"
                                                    placeholder="Password">
                                                @error('password') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="passwordConfirm">
                                                    <h4>Confirm Password</h4>
                                                </label>
                                                <input wire:model="password_confirm" type="password"
                                                    class="form-control" name="password_confirm"
                                                    placeholder="Confirm Password">
                                                @error('password_confirm') <span
                                                        class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button style="background-color: #3d9970; color:white; padding:10px 20px"
                                                class="btn" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
                                                Save</button>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                            </div>
                            <!--/tab-pane-->
                            <div class="tab-pane" id="messages">

                                <h2></h2>

                                <hr>
                                <form class="form" action="##" method="post" id="registrationForm">
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="firstName">
                                                <h4>First name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="firstName" id="firstName"
                                                placeholder="first name" title="enter your first name if any." required>
                                            @error('firstName') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="lastName">
                                                <h4>Last name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="last" id="last_name"
                                                placeholder="last name" title="enter your last name if any." required>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone">
                                                <h4>Phone</h4>
                                            </label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="enter phone" title="enter your phone number if any.">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success" type="submit"><i
                                                    class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i
                                                    class="glyphicon glyphicon-repeat"></i>
                                                Reset</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!--/tab-pane-->
                            <div class="tab-pane" id="settings">


                                <hr>
                                <form class="form" action="##" method="post" id="registrationForm">
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h4>First name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                placeholder="first name" title="enter your first name if any.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h4>Last name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                placeholder="last name" title="enter your last name if any.">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone">
                                                <h4>Phone</h4>
                                            </label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="enter phone" title="enter your phone number if any.">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile">
                                                <h4>Mobile</h4>
                                            </label>
                                            <input type="text" class="form-control" name="mobile" id="mobile"
                                                placeholder="enter mobile number"
                                                title="enter your mobile number if any.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="you@email.com" title="enter your email.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Location</h4>
                                            </label>
                                            <input type="email" class="form-control" id="location"
                                                placeholder="somewhere" title="enter a location">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h4>Password</h4>
                                            </label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="password" title="enter your password.">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password2">
                                                <h4>Verify</h4>
                                            </label>
                                            <input type="password" class="form-control" name="password2" id="password2"
                                                placeholder="password2" title="enter your password2.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <br>
                                            <button class="btn btn-lg btn-success pull-right" type="submit"><i
                                                    class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->

                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
        </div>
    </div>
</div>


<style>
    h4 {
        font-size: 1.1rem;
    }

</style>
