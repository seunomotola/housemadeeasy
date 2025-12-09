<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Make Money with Housemadeeasy</title>
<link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
/* Fade-up and scale-up modal */
.modal .modal-dialog {
    transform: translateY(100px) scale(0.9);
    transition: transform 0.4s ease, transform 0.4s ease;
}

.modal.show .modal-dialog {
    transform: translateY(0) scale(1);
}
</style>

</head>

<body>

<button id="openBtn" class="btn btn-primary mt-5 ml-5">
    Become a Provider
</button>

<!-- The modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content p-4">
      <div class="modal-step-welcome">
        <h2>Welcome to Housemadeeasy</h2>
        <p>Click "next" to view our terms and conditions.</p>
        <br>
        <button id="agreeBtn" class="btn btn-primary">Next</button>
      </div>

      <div class="modal-step-terms" style="display: none">
        <h2>Terms and Conditions</h2>
        <p>YOU GET PAID ONLY WHEN THE HOUSE IS RENTED THROUGH HOUSEMADEEASY</p>
        <br>
        <button id="iAgreeBtn" class="btn btn-success">I Agree</button>
        <button id="iDisagreeBtn" class="btn btn-warning">I Do Not Agree</button>
      </div>

      <div class="modal-step1" style="display: none">
        <h2>Let us know about you</h2>
        <input id="name" class="form-control mb-2" placeholder="Your Name">
        <input id="whatsapp" class="form-control mb-2" placeholder="Whatsapp Number">
        <input id="call" class="form-control mb-2" placeholder="Call Number (if different)"> 
        <br>
        <button id="nextBtn1" class="btn btn-primary">Next</button>
      </div>

      <div class="modal-step2" style="display: none">
        <h2>Let us know about the Apartment</h2>
        <input id="type" class="form-control mb-2" placeholder="Type of Apartment">
        <select id="area" class="form-control mb-2">
          <option value="">Select area</option>
          <option value="ISALE OKO">ISALE OKO</option>
          <option value="HOSPITAL ROAD">HOSPITAL ROAD</option>
          <option value="ARAROMI">ARAROMI</option>
          <option value="AYEGBAMI">AYEGBAMI</option>
          <option value="AYEPE ROAD">AYEPE ROAD</option>
        </select>
        <input id="address" class="form-control mb-2" placeholder="Address">
        <input id="landlord" class="form-control mb-2" placeholder="Landlord Contact (if available)"> 
        <br>
        <button id="nextBtn2" class="btn btn-primary">Submit</button>
      </div>

      <div class="modal-step3" style="display: none">
        <h2>Submission Successful</h2>
        <p>Your submission has been received. Thank you.</p>
      </div>

    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->

<script>
$('#openBtn').on('click', function(){
    $('.modal-step-welcome').show();
    $('.modal-step-terms, .modal-step1, .modal-step2, .modal-step3').hide();
    $('#welcomeModal').modal('show'); 
});

// Next to terms
$('#agreeBtn').on('click', function(){
    $('.modal-step-welcome').fadeOut(function(){
        $('.modal-step-terms').fadeIn();
    });
});

// If I Disagree, just close
$('#iDisagreeBtn').on('click', function(){
    $('#welcomeModal').modal('hide'); 
});

// If I Agree, move to first form
$('#iAgreeBtn').on('click', function(){
    $('.modal-step-terms').fadeOut(function(){
        $('.modal-step1').fadeIn();
    });
});

// Handle User submission
$('#nextBtn1').on('click', function(){
    let name = $('#name').val();
    let whatsapp = $('#whatsapp').val();
    let call = $('#call').val();

    if (name === '' || whatsapp === '') {
        alert('Please fill all required fields');
        return;
    }
    $.ajax({ 
        url:'process_user.php',
        type:'POST',
        data:{name: name, whatsapp: whatsapp, call: call},
        success: function(data) {
            console.log(data);
            if (data.success) {
                $('.modal-step1').fadeOut(function(){
                    $('.modal-step2').fadeIn();
                });
            } else {
                alert('Submission failed. Please try again');
            }
        },
        error: function (xhr, status, error) {
            console.log('AJAX Error!', error);
        }
    });

});

// Handle Apartment submission
$('#nextBtn2').on('click', function(){
    let type = $('#type').val();
    let area = $('#area').val();
    let address = $('#address').val();
    let landlord = $('#landlord').val();

    if (type === '' || area === '' || address === '') {
        alert('Please fill all required fields');
        return;
    }
    $.ajax({ 
        url:'process_apartment.php',
        type:'POST',
        data:{type: type, area: area, address: address, landlord: landlord},
        success: function(data) {
            console.log(data);
            if (data.success) {
                $('.modal-step2').fadeOut(function(){
                    $('.modal-step3').fadeIn();
                });
            } else {
                alert('Submission failed. Please try again');
            }
        },
        error: function (xhr, status, error) {
            console.log('AJAX Error!', error);
        }
    });

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
