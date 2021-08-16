
<?php
require_once '../../path.php';
require_once ROOT_PATH . '/connect.php';
?>
<?php require_once ROOT_PATH . '/session.php'; ?>
<!-- sidebar and side bar-->
<?php require_once ROOT_PATH . '/includes/header.php'; ?>
<?php require_once ROOT_PATH . '/includes/sidebar.php'; ?>
<?php
if (isset($_POST['evidence'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $desc=$_POST['desc'];
    $id = $_GET['id'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

   // get the file extension
   $extension = pathinfo($filename, PATHINFO_EXTENSION);

   // the physical file on a temporary uploads directory on the server
   $file = $_FILES['myfile']['tmp_name'];
   $size = $_FILES['myfile']['size'];

   if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
       echo "<script>alert('You file extension must be .zip, .pdf or .docx'); window.location='investigation.php'</script>";
   } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    echo "<script>alert('File too large'); window.location='investigation.php'</script>";
   } else {
       // move the uploaded (temporary) file to the specified destination
       if (move_uploaded_file($file, $destination)) {

          $sql ="INSERT INTO `evidence` (`evidenceId`, `investId`, `attachment_name`, `attachment_size`, `downloads`, `edescription`) VALUES (NULL, '$id', '$filename', '$size', '0', '$desc')";
       
           if (mysqli_query($conn, $sql)) {
            echo "<script>alert('You Have successfully uploaded case evidences'); window.location='evidences.php'</script>";
           }
       } else {
        echo "<script>alert('failed); window.location='investigation.php'</script>";
       }
   }
}

?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Your Case Evidences</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo BASE_URL . '/police/index.php' ?>">Home</a></li>
                    <li><i class="fa fa-laptop"></i><a href="<?php echo BASE_URL . '/police/investigation/investigation.php' ?>">Investigtion</a></li>
                    <li><i class="fa fa-laptop"></i>Case Evidences</li>
                </ol>
            </div>
        </div>
        <!-- evidences -->
        <div class="row">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Case Evidences form
              </header>
              <div class="panel-body">
                <form role="form" enctype="multipart/form-data" method="POST" action="">
                  <div class="form-group">
                    <label for="desc">Short Evidence Description</label><br>
                  <textarea name="desc" id="desc" cols="50" rows="3"></textarea>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Evidence Attachment</label>
                    <input type="file" name="myfile" id="exampleInputFile">
                    <p class="help-block">Upload Your Evidence Report.</p>
                  </div>
                 
                  <button type="submit" class="btn btn-primary" name="evidence">Submit</button>
                </form>

              </div>
            </section>
          </div>
        


<?php require_once ROOT_PATH . '/includes/footer.php'; ?>
