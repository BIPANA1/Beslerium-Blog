@extends('User.layouts.main')
@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary">
                <img src="/Image/user.png" height="100" width="100" /></button>
            <span class="name mt-3"> Bipana Shrestha </span> <span class="idd">@eleanorpena</span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1">Oxc4c16a645_b21a</span> <span><i class="fa fa-copy"></i></span>
            </div>
            <div class=" d-flex mt-2">
            <button class="btn btn-dark me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
            <button class="btn btn-dark"> Delete Profile</button>
             </div>
            <!-- <div class="text mt-3"> <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital
                    artwork.</span> </div> -->
            <!-- <div class=" px-2 rounded mt-4 date "> <span class="join">Joined May,2021</span> </div> -->
            <div class="d-flex mt-4" style="cursor:pointer">
                <span class="text-decoration-underline" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                  Change Password
                </span>
              </div>
        </div>
    </div>
</div>


<!-- edit profile -->
<div class="modal fade mt-4" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form>
        <div class="mb-3">
          <label for="profileImage" class="form-label">Profile Image</label>
          <input type="file" class="form-control" id="profileImage">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Name</label>
            <input type="text" class="form-control" id="address">
          </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save Changes</button>
    </div>
  </div>
</div>
</div>


<!-- Change Password -->
<div class="modal fade mt-4" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form>
        <div class="mb-3">
          <label for="currentPassword" class="form-label">Current Password</label>
          <input type="password" class="form-control" id="currentPassword">
        </div>
        <div class="mb-3">
          <label for="newPassword" class="form-label">New Password</label>
          <input type="password" class="form-control" id="newPassword">
        </div>
        <div class="mb-3">
          <label for="confirmNewPassword" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" id="confirmNewPassword">
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save Changes</button>
    </div>
  </div>
</div>
</div>

@endsection
