@extends('template.dashboard')
@section('title')
    Veris
@endsection
@section('title-section')
    Registro
@endsection


@section('content')
<!-- vendor css files -->
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">

<section class="modern-horizontal-wizard">
  <div class="bs-stepper wizard-modern modern-wizard-example">
    <div class="bs-stepper-header">
      <div class="step" data-target="#account-details-modern" role="tab" id="account-details-modern-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="file-text" class="font-medium-3"></i>1
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Account Details</span>
            <span class="bs-stepper-subtitle">Setup Account Details</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#personal-info-modern" role="tab" id="personal-info-modern-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="user" class="font-medium-3"></i>2
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Personal Info</span>
            <span class="bs-stepper-subtitle">Add Personal Info</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#address-step-modern" role="tab" id="address-step-modern-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="map-pin" class="font-medium-3"></i>3
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Address</span>
            <span class="bs-stepper-subtitle">Add Address</span>
          </span>
        </button>
      </div>
      <div class="line">
        <i data-feather="chevron-right" class="font-medium-2"></i>
      </div>
      <div class="step" data-target="#social-links-modern" role="tab" id="social-links-modern-trigger">
        <button type="button" class="step-trigger">
          <span class="bs-stepper-box">
            <i data-feather="link" class="font-medium-3"></i>4
          </span>
          <span class="bs-stepper-label">
            <span class="bs-stepper-title">Social Links</span>
            <span class="bs-stepper-subtitle">Add Social Links</span>
          </span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <div id="account-details-modern" class="content" role="tabpanel" aria-labelledby="account-details-modern-trigger">
        <div class="content-header">
          <h5 class="mb-0">Account Details</h5>
          <small class="text-muted">Enter Your Account Details.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-username">Username</label>
            <input type="text" id="modern-username" class="form-control" placeholder="johndoe" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-email">Email</label>
            <input
              type="email"
              id="modern-email"
              class="form-control"
              placeholder="john.doe@email.com"
              aria-label="john.doe"
            />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 form-password-toggle col-md-6">
            <label class="form-label" for="modern-password">Password</label>
            <input
              type="password"
              id="modern-password"
              class="form-control"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            />
          </div>
          <div class="mb-1 form-password-toggle col-md-6">
            <label class="form-label" for="modern-confirm-password">Confirm Password</label>
            <input
              type="password"
              id="modern-confirm-password"
              class="form-control"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Anterior</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Siguiente</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>
      <div id="personal-info-modern" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
        <div class="content-header">
          <h5 class="mb-0">Personal Info</h5>
          <small>Enter Your Personal Info.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-first-name">First Name</label>
            <input type="text" id="modern-first-name" class="form-control" placeholder="John" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-last-name">Last Name</label>
            <input type="text" id="modern-last-name" class="form-control" placeholder="Doe" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-country">Country</label>
            <select class="select2 w-100" id="modern-country">
              <option label=" "></option>
              <option>UK</option>
              <option>USA</option>
              <option>Spain</option>
              <option>France</option>
              <option>Italy</option>
              <option>Australia</option>
            </select>
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-language">Language</label>
            <select class="select2 w-100" id="modern-language" multiple>
              <option>English</option>
              <option>French</option>
              <option>Spanish</option>
            </select>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Anterior</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Siguiente</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>
      <div id="address-step-modern" class="content" role="tabpanel" aria-labelledby="address-step-modern-trigger">
        <div class="content-header">
          <h5 class="mb-0">Address</h5>
          <small>Enter Your Address.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-address">Address</label>
            <input
              type="text"
              id="modern-address"
              class="form-control"
              placeholder="98  Borough bridge Road, Birmingham"
            />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-landmark">Landmark</label>
            <input type="text" id="modern-landmark" class="form-control" placeholder="Borough bridge" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="pincode3">Pincode</label>
            <input type="text" id="pincode3" class="form-control" placeholder="658921" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="city3">City</label>
            <input type="text" id="city3" class="form-control" placeholder="Birmingham" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Anterior</span>
          </button>
          <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Siguiente</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
          </button>
        </div>
      </div>
      <div id="social-links-modern" class="content" role="tabpanel" aria-labelledby="social-links-modern-trigger">
        <div class="content-header">
          <h5 class="mb-0">Social Links</h5>
          <small>Enter Your Social Links.</small>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-twitter">Twitter</label>
            <input type="text" id="modern-twitter" class="form-control" placeholder="https://twitter.com/abc" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-facebook">Facebook</label>
            <input type="text" id="modern-facebook" class="form-control" placeholder="https://facebook.com/abc" />
          </div>
        </div>
        <div class="row">
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-google">Google+</label>
            <input type="text" id="modern-google" class="form-control" placeholder="https://plus.google.com/abc" />
          </div>
          <div class="mb-1 col-md-6">
            <label class="form-label" for="modern-linkedin">Linkedin</label>
            <input type="text" id="modern-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Anterior</span>
          </button>
          <button class="btn btn-success btn-submit">Enviar</button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection