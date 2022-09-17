@extends('base')

@section('content')
<section class="default-banner" id="banner">
    <div class="position-absolute w-100 banner-cover h-100 d-flex flex-column justify-content-between">
        <div class="imagem-1">
            <img class="banner-svg1" src="/svg/bannerimg1.svg" frameborder="0"></img>
        </div>
        <div class="container py-3 px-4 w-75 d-flex justify-content-between flex-column flex-md-row">
            <div>
                <h5 class="text-secondary fw-bold">
                    -- File Income Tax
                </h5>
                <h1 class="heading text-white fw-bold pb-3" id="slider-heading">
                    Fill out <br>
                    The IT Form
                </h1>
            </div>
            <button
                class="arrow-btn btn text-white border border-3 arrow-icon bg-transparent rounded-circle mt-5 d-none d-md-block">
                <i class="fa-solid fa-angle-down fa-xs"></i>
            </button>
            

        </div>
        <div class="imagem-2 ms-auto">
            <img class="banner-svg2" src="/svg/bannerimg2.svg" alt="">
        </div>
    </div>
</section>
<section class="contact-banner d-flex justify-content-center align-items-center" id="scroll">
    <div class="row container py-3 px-4 w-75 d-flex justify-content-between flex-column flex-md-row">
        <div class="col-md-6">
            <h1 class="display-6 text-white fw-bold pb-3" id="slider-heading">
                Fill out the Details to get <br> Registered in Income tax
            </h1>
        </div>
        <div class="col-md-10 mt-5">
            <form method="POST" onsubmit="return validateForm();">
                @csrf   
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="name">Name</label>
                    <input type="text" class="contact-input" id="name" name="name" value={{$name}} onkeyup="validate(this)" required>
                    <div class="error ps-5" id="nameErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="email">Email</label>
                    <input type="text" class="contact-input" id="email" name="email" value={{$email}} onkeyup="validate(this)" required>
                    <div class="error ps-5" id="emailErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="phone">Phone</label>
                    <input type="text" class="contact-input" id="phone" name="phone" value={{$phone}} onkeypress="validate(this)" required>
                    <div class="error ps-5" id="phoneErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="cnic">CNIC</label>
                    <input type="text" class="contact-input" id="cnic" name="cnic" value={{$cnic}} onkeyup="validate(this)" required>
                    <div class="error ps-5" id="cnicErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="nationality">Nationality</label>
                    <input type="text" class="contact-input" id="nationality" name="nationality" onkeyup="validate(this)" required>
                    <div class="error ps-5" id="nationalityErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="tax_year">Tax Year</label>
                    <input type="text" class="contact-input" id="tax_year" name="tax_year" onkeyup="validate(this)" required>
                    <div class="error ps-5" id="tax_yearErr" style="color: red"></div>
                </div>
                <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                    data-aos="zoom-in-up" data-aos-duration="1000">
                    <label class="contact-label fs-5 fw-bold" for="address">Address</label>
                    <input type="text" class="contact-input" id="address" name="address" onkeyup="validate(this)" required>
                    <div class="error" id="addressErr" style="color: red"></div>
                </div>
                <div class="text-white">
                    <h4>
                        Your source of income:
                    </h4>
                    <div class="row mt-3">
                        <div class="form-check col-md-3 offset-1">
                            <input class="form-check-input" type="radio" name="income" id="business" onclick="selectedIncome(this)">
                            <label class="form-check-label" for="business">
                              Business
                            </label>
                        </div>
                        <div class="form-check col-md-3">
                            <input class="form-check-input" type="radio" name="income" id="job" onclick="selectedIncome(this)">
                            <label class="form-check-label" for="job">
                              Job
                            </label>
                        </div>
                        <div class="form-check col-md-3">
                            <input class="form-check-input" type="radio" name="income" id="both" onclick="selectedIncome(this)">
                            <label class="form-check-label" for="both">
                              Both
                            </label>
                        </div>
                    </div>
                </div>
                <div class="incomeForm mt-5">
                    <div class="d-none" id="business_inputs">
                        <h4 class="text-white pb-4">Business Details:</h4>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="business_name">Name</label>
                            <input type="text" class="contact-input" id="business_name" name="business_name">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="business_address">Address</label>
                            <input type="text" class="contact-input" id="business_address" name="business_address">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="gross_income">Gross Income</label>
                            <input type="text" class="contact-input" id="gross_income" name="gross_income">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="expenditures">Expenditures</label>
                            <input type="text" class="contact-input" id="expenditures" name="expenditures">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                    </div>
                    <div class="d-none" id="job_inputs">
                        <h4 class="text-white pb-4">Job Details:</h4>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="company_name">Company Name</label>
                            <input type="text" class="contact-input" id="company_name" name="company_name">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="company_address">Company Address</label>
                            <input type="text" class="contact-input" id="company_address" name="company_address">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="salary">Salary</label>
                            <input type="text" class="contact-input" id="salary" name="salary">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="accordion-item accordion-it">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      <button class="optional-input accordion-button collapsed bg-transparent rounded text-white border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Business
                      </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse pt-5" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="business_name">Name</label>
                            <input type="text" class="contact-input" id="business_name" name="business_name">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="business_address">Address</label>
                            <input type="text" class="contact-input" id="business_address" name="business_address">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="gross_income">Gross Income</label>
                            <input type="text" class="contact-input" id="gross_income" name="gross_income">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="expenditures">Expenditures</label>
                            <input type="text" class="contact-input" id="expenditures" name="expenditures">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item accordion-it mt-5">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed bg-transparent rounded text-white border border-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Salary
                      </button> 
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse pt-5" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="company_name">Company Name</label>
                            <input type="text" class="contact-input" id="company_name" name="company_name">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="company_address">Company Address</label>
                            <input type="text" class="contact-input" id="company_address" name="company_address">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                        <div class="form-group d-flex flex-column pb-5 position-relative aos-init aos-animate"
                            data-aos="zoom-in-up" data-aos-duration="1000">
                            <label class="contact-label fs-5 fw-bold" for="salary">Salary</label>
                            <input type="text" class="contact-input" id="salary" name="salary">
                            <div class="error" id="cnicErr" style="color: white"></div>
                        </div>
                    </div>
                </div> --}}
                <button class="btn btn-lg contact-btn text-white rounded-pill mt-5" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function validate(field){
        const patterns = {
            name: new RegExp("^[a-zA-Z0-9]{5,20}$"),
            cnic: new RegExp("^[0-9]{13}$"),
            email: new RegExp("^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$"),
            phone: new RegExp("^[0-9]{9,15}$"),
            nationality: new RegExp("^[a-zA-Z]{3,20}$"),
            tax_year: new RegExp("^[0-9]{4}$"),
            address: new RegExp("^[a-zA-Z0-9\s,.'-]{3,}$"),
        };
        if (patterns[field.name].test(field.value)){
            document.getElementById(field.name+'Err').innerHTML = "";
            document.getElementById(field.name+'Err').style.borderColor = "blue";
        }
        else{
            document.getElementById(field.name+'Err').innerHTML = "Invalid "+field.name;
            document.getElementById(field.name+'Err').style.borderColor = "Red";
        }
    }
    function selectedIncome(field){
        if (field.id == "both"){
            document.getElementById("business_inputs").classList.remove('d-none');
            document.getElementById("job_inputs").classList.remove('d-none');
        }
        else if (field.id == "business"){
            document.getElementById("business_inputs").classList.remove('d-none');
            document.getElementById("job_inputs").classList.add('d-none');
        }
        else if (field.id == "job"){
            document.getElementById("job_inputs").classList.remove('d-none');
            document.getElementById("business_inputs").classList.add('d-none');
        }
    }
</script>
@endsection

