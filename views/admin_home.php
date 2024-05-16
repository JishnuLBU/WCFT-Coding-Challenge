<?php
require_once '../controllers/AdminController.php';

$controller = new AdminController();
$patients = $controller->getAllPatients();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>WCFT | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../public/assets/images/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../public/assets/css/bootstrap.min.css" />
  <!-- Typography CSS -->
  <link rel="stylesheet" href="../public/assets/css/typography.css" />
  <!-- Style CSS -->
  <link rel="stylesheet" href="../public/assets/css/style.css" />
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="../public/assets/css/responsive.css" />
</head>

<body>
  <!-- Wrapper Start -->
  <div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
      <div class="iq-navbar-logo d-flex justify-content-between">
        <a href="index.html" class="header-logo">
          <img src="../public/assets/images/patient-logo.jpg" class="img-fluid rounded" alt="" />
          <span>WCFT</span>
        </a>
        <div class="iq-menu-bt align-self-center">
          <div class="wrapper-menu">
            <div class="main-circle"><i class="ri-menu-line"></i></div>
            <div class="hover-circle"><i class="ri-close-fill"></i></div>
          </div>
        </div>
      </div>
      <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="active">
              <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
            </li>

            <li>
              <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-user-tie iq-arrow-left"></i><span>Patient Search</span></a>
            </li>
          </ul>
        </nav>
        <div class="p-3"></div>
      </div>
    </div>
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
      <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="iq-menu-bt d-flex align-items-center">
            <div class="wrapper-menu">
              <div class="main-circle"><i class="ri-menu-line"></i></div>
              <div class="hover-circle"><i class="ri-close-fill"></i></div>
            </div>
            <div class="iq-navbar-logo d-flex justify-content-between ml-3">
              <a href="index.html" class="header-logo">
                <img src="../public/assets/images/logo.png" class="img-fluid rounded" alt="" />
                <span>WCFT</span>
              </a>
            </div>
          </div>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
          <ul class="navbar-list">
            <li class="line-height">
              <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                <img src="../public/assets/images/user/1.jpg" class="img-fluid rounded mr-3" alt="user" />
                <div class="caption">
                  <h6 class="mb-0 line-height">John Doe</h6>
                  <p class="mb-0">Admin</p>
                </div>
              </a>
              <div class="iq-sub-dropdown iq-user-dropdown">
                <div class="iq-card shadow-none m-0">
                  <div class="iq-card-body p-0">
                    <div class="d-inline-block w-100 text-center p-3">
                      <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- TOP Nav Bar END -->

    <div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Patient Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-horizontal" action="">
              <div class="form-group row">
                <label class="control-label col-sm-4 align-self-center mb-0" for="firstName">First Name :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="firstName_view" name="firstName_view" disabled>


                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-sm-4 align-self-center mb-0" for="surname">SurName :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="surName_view" name="surName" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-sm-4 align-self-center mb-0" for="date_of_birth">Date of Birth :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="dateOfBirth_view" name="dateOfBirth" placeholder="2019/12/01" disabled />
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-sm-4 align-self-center mb-0" for="age">Age :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="age_view" name="age" placeholder="49" disabled />
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 align-self-center mb-0" for="age">Total Score :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="totalScore_view" name="totalScore" disabled />
                </div>
              </div>
              <div id ="QA-div">

              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Patient Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <div class="form-horizontal" action="">
                <div class="form-group row">
                  <label class="control-label col-sm-4 align-self-center mb-0" for="firstName">First Name :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" name="firstName">


                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-sm-4 align-self-center mb-0" for="surname">SurName :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="surName" name="surName">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-sm-4 align-self-center mb-0" for="date_of_birth">Date of Birth :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="2019/12/01" />
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-sm-4 align-self-center mb-0" for="age">Age :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="age" name="age" placeholder="49" />
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-sm-4 align-self-center mb-0" for="age">Total Score :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="totalScore" name="totalScore" />
                    <input type="text" class="form-control" id="patientId" name="patientId" hidden />
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Page Content  -->
    <div id="content-page" class="content-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height dash-card">
              <div class="iq-card-body iq-box-relative">
                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                  <i class="las la-user-tie iq-arrow-left"></i>
                </div>
                <p class="text-secondary">Total Patients</p>
                <div class="d-flex align-items-center justify-content-between">
                  <h4><b><?php echo count($patients) ?></b></h4>
                  <div id="iq-chart-box1"></div>
                </div>
              </div>
            </div>
          </div>
          

          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height dash-card">
              <div class="iq-card-body iq-box-relative">
                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success">
                  <i class="las la-user-tie iq-arrow-left"></i>
                </div>
                <p class="text-secondary">Patients With Age Above:50</p>
                <div class="d-flex align-items-center justify-content-between">
                  <?php
                  $countAgeAbove100 = 0;
                  foreach ($patients as $patient) {
                    if ($patient['age'] > 50) {
                      $countAgeAbove100++;
                    }
                  }
                  ?>
                  <h4><b><?php echo $countAgeAbove100; ?></b></h4>
                  <div id="iq-chart-box1"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height dash-card">
              <div class="iq-card-body iq-box-relative">
                <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                  <i class="las la-user-tie iq-arrow-left"></i>
                </div>
                <p class="text-secondary">Patients with Total Score>100</p>
                <div class="d-flex align-items-center justify-content-between">
                  <?php
                  $countAbove100 = 0;
                  foreach ($patients as $patient) {
                    if ($patient['total_score'] > 30) {
                      $countAbove100++;
                    }
                  }
                  ?>
                  <h4><b><?php echo $countAbove100; ?></b></h4>
                  <div id="iq-chart-box1"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="iq-card">
              <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                  <h4 class="card-title">Patients List</h4>
                </div>
              </div>
              <div class="iq-card-body">
                <div class="table-responsive">
                  <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-6">
                      <div id="user_list_datatable_info" class="dataTables_filter">
                        <form class="mr-3 position-relative filter-head" id="filterForm">
                          <div class="form-group mb-0">
                            <label for="name">Name</label>
                            <input type="search" class="form-control" id="name" placeholder="Search" aria-controls="user-list-table" />
                          </div>

                          <!-- <div class="form-group">
                              <label for="exampleInputdate"
                                >Date of Birth</label
                              >
                              <input
                                type="date"
                                class="form-control"
                                id="exampleInputdate"
                                value=""
                              />
                            </div> -->

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                              Filter
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="user-list-files d-flex float-right">

                      </div>
                    </div>
                  </div>
                  <table id="user-list-table" class="table table-striped table-bordered mt-0" role="grid" aria-describedby="user-list-page-info">
                    <thead>
                      <tr>
                        <th>Date of Submission</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Age</th>
                        <th>Date of Birth</th>
                        <th>Total Score</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($patients as $patient) { ?>
                        <tr>
                          <td><?php echo $patient['formatted_created_at']; ?></td>
                          <td><?php echo $patient['first_name']; ?></td>
                          <td><?php echo $patient['surname']; ?></td>
                          <td><?php echo $patient['age']; ?></td>
                          <td><?php echo $patient['formatted_date_of_birth']; ?></td>
                          <td><?php echo $patient['total_score']; ?></td>
                          <td>
                            <div class="flex align-items-center list-user-action">
                              <a class="iq-bg-primary" data-toggle="modal" data-target="#viewModal" data-placement="top" title="" data-original-title="View" data-id="<?php echo $patient['id']; ?>" id="viewButton" href="#">
                                <i class="ri-eye-line"></i>
                              </a>
                              <a class="iq-bg-primary" id="editButton" data-toggle="modal" data-target="#editModal" data-placement="top" data-id="<?php echo $patient['id']; ?>" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                              <a class="iq-bg-primary" data-toggle="tooltip" data-id="<?php echo $patient['id']; ?>" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>

                  </table>
                </div>
                <div class="row justify-content-between mt-3">
                  <div id="user-list-page-info" class="col-md-6">
                    <span>Showing 1 to 10 of 5 entries</span>
                  </div>
                  <div class="col-md-6">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Wrapper END -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../public/assets/js/jquery.min.js"></script>
  <script src="../public/assets/js/popper.min.js"></script>
  <script src="../public/assets/js/bootstrap.min.js"></script>
  <!-- Counterup JavaScript -->
  <script src="../public/assets/js/jquery.counterup.min.js"></script>
  <!-- Wow JavaScript -->
  <script src="../public/assets/js/wow.min.js"></script>
  <!-- Slick JavaScript -->
  <script src="../public/assets/js/slick.min.js"></script>
  <!-- Select2 JavaScript -->
  <script src="../public/assets/js/select2.min.js"></script>
  <!-- Magnific Popup JavaScript -->
  <script src="../public/assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Smooth Scrollbar JavaScript -->
  <script src="../public/assets/js/smooth-scrollbar.js"></script>
  <!-- am animated JavaScript -->
  <!-- Chart Custom JavaScript -->
  <script src="../public/assets/js/chart-custom.js"></script>
  <!-- Custom JavaScript -->
  <script src="../public/assets/js/custom.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on('click', '#viewButton', function() {
        var id = $(this).data('id');
        $.ajax({
          url: 'view_patient.php',
          method: 'GET',
          data: {
            id: id
          },
          success: function(data) {
            var patientData = JSON.parse(data);
            $('#firstName_view').val(patientData.patient.first_name).prop('readonly', true);
            $('#surName_view').val(patientData.patient.surname).prop('readonly', true);
            $('#dateOfBirth_view').val(patientData.patient.formatted_date_of_birth).prop('readonly', true);
            $('#age_view').val(patientData.patient.age).prop('readonly', true);
            $('#totalScore_view').val(patientData.patient.total_score).prop('readonly', true);
            $('#patientId_view').val(patientData.patient.id);
            $('#QA-div').empty(); // Clear existing questions
            alert(patientData.patientQA.question_text)
            patientData.patientQA.forEach(function(question) {
              alert(question.question_text);
              $('#QA-div').append('<div>' + question.question_text + '</div>');
            });
            $('#patientModal').modal('show');
          }
        });

      });
      $(document).on('click', '#editButton', function() {
        var id = $(this).data('id');
        $.ajax({
          url: 'view_patient.php',
          method: 'GET',
          data: {
            id: id
          },
          success: function(data) {
            var patient = JSON.parse(data);
            $('#firstName').val(patient.first_name);
            $('#surName').val(patient.surname)
            $('#dateOfBirth').val(patient.date_of_birth);
            $('#age').val(patient.age);
            $('#totalScore').val(patient.total_score);
            $('#patientId').val(patient.id);
          }
        });
      });

      $('.delete-btn').click(function() {
        if (confirm('Are you sure you want to delete this record?')) {
          var id = $(this).data('id');
          $.ajax({
            url: 'delete_patient.php',
            method: 'POST',
            data: {
              id: id
            },
            success: function(response) {
              location.reload();
            }
          });
        }
      });

      $(document).on('submit', '#editForm', function(e) {
        e.preventDefault();
        $.ajax({
          url: 'update_patient.php',
          method: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            $('#editModal').modal('hide');
            location.reload();
          }
        });
      });

      $('#filterForm').submit(function(e) {
        e.preventDefault();
        var firstName = $(this).data('firstName');
        $.ajax({
          url: 'search_patient.php',
          method: 'GET',
          data: {
            firstName: firstName
          },
          success: function(data) {
            // Update the table with search results
            $('#user-list-table tbody').html(data);
          },
          error: function(xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
          }
        });
      });
    });
  </script>
</body>

</html>