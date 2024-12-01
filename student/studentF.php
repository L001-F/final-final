<?php 
$matricule=isset($_GET['matricule'])? $_GET['matricule']:'';
if(!$matricule){
    header("Location: index.php");
}else{
  include('../../model/class.php') ;
  $std=new Scolarite();
}  

 // Fetch user profile using matricule to display
 $profile = $std->getProfile($matricule); 
 if (!$profile) {
     die("User profile not found!");
 }


 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Envoyer']) ) {
  $matricule = $_POST['matricule'];
  $type_doc=$_POST['type_doc'];
  $other_doc = $_POST['other_doc'] ?? '';
    $student->addDemande($matricule, $type_doc, $other_doc);
 
}     
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>monPortail-studentSpace</title>
  <!-- bootsrap link  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      height: 100vh;
      background-color: #153561;
    }

    .sidebar {
      width: 270px;
      background-color: #1d3557;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: fixed;
      height: 100%;
      padding: 20px;
    }

    .sidebar .brand {
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .sidebar .brand i {
      font-size: 30px;
      margin-right: 10px;
    }

    .sidebar .menu {
      flex-grow: 1;
    }

    .sidebar .menu a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: white;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 10px;
      transition: background-color 0.3s;
      cursor: pointer;
    }

    .sidebar .menu a i {
      width: 80px;
      font-size: 18px;
      margin: 20px; 
    }

    .sidebar .menu a:hover,
    .sidebar .menu a.active {
      background-color: #1a304f;
    }

    .sidebar .footer {
      border-top: 1px solid #56567E;
      padding-top: 15px;
      display: flex;
      align-items: center;
    }

    .sidebar .footer i {
      font-size: 25px;
      margin-right: 10px;
    }

    .sidebar .footer p {
      margin: 0;
    }

    .sidebar .footer p span {
      font-size: 12px;
      color: #D0D0F5;
    }

    .content {
      margin-left: 270px;
      padding: 60px;
      flex: 1;
      background-color:#d5dce6;
      overflow-y: auto;
    }

    .section {
      display: none;
    }

    .section.active {
      display: block;
    }
    body {
    background-color: #f4f6f9;
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
  }

  .page-title {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    color: #1d3557; 
    margin-bottom: 40px;
  }

  .profile-container {
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    padding: 40px;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    border-top: 5px solid #1e80b7;
  }

  .profile-header {
    margin-bottom: 25px;
  }

  .profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #4d80b0;
    margin-bottom: 20px;
  }

  .profile-name {
    font-size: 26px;
    color: #1d3557; 
    font-weight: bold;
    margin-bottom: 12px;
  }

  .profile-id {
    font-size: 14px;
    color: #777;
  }

  .profile-info {
    margin-top: 30px;
    text-align: left;
  }

  .info-item {
    margin-bottom: 20px;
    font-size: 18px;
    color: #333;
  }

  .info-item label {
    font-weight: bold;
    color: #1e80b7; 
  }

  .info-item span {
    font-size: 16px;
    color: #555;
  }
  body {
  margin: 0;
  font-family: 'Arial', sans-serif;
  display: flex;
  height: 100vh;
  background-color: #153561;
  position: relative;
}

body::before,
body::after,
body .sidebar::before,
body .sidebar::after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  border-style: solid;
}

body::before {
  top: 0;
  left: 0;
  border-width: 40px;
  border-color: #1d3557 transparent transparent transparent; 
}
body::after {
  top: 0;
  right: 0;
  border-width: 40px;
  border-color: #1d3557 transparent transparent transparent; 
}

body .sidebar::before {
  bottom: 0;
  left: 0;
  border-width: 40px;
  border-color: transparent transparent #1d3557 transparent; 
}

body .sidebar::after {
  bottom: 0;
  right: 0;
  border-width: 40px;
  border-color: transparent transparent #1d3557 transparent;
}

.sidebar {
  width: 270px;
  background-color: #1d3557;
  color: white;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  position: fixed;
  height: 100%;
  padding: 20px;
  z-index: 10; 
}


.sidebar .brand {
  display: flex;
  align-items: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.sidebar .menu {
  flex-grow: 1;
}


.sidebar {
  background: linear-gradient(to bottom, #1d3557, #3e5c76);
}


.sidebar .menu a {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: white;
  padding: 15px;
  border-radius: 5px;
  margin-bottom: 10px;
  transition: background-color 0.3s;
  cursor: pointer;
}


.sidebar .menu a:hover,
.sidebar .menu a.active {
  background-color: #1a304f;
}


.content {
  margin-left: 270px;
  padding: 60px;
  flex: 1;
  background-color: #d5dce6;
  overflow-y: auto;
  position: relative;
  z-index: 5; 
}


.page-title {
  text-align: center;
  font-size: 32px;
  font-weight: bold;
  color: #1d3557;
  margin-bottom: 40px;
}

.profile-container {
  background-color: #fff;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 12px;
  padding: 40px;
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
  border-top: 5px solid #1e80b7;
}

.profile-header {
  margin-bottom: 25px;
}

.profile-photo {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 5px solid #4d80b0;
  margin-bottom: 20px;
}

.profile-name {
  font-size: 26px;
  color: #1d3557; 
  font-weight: bold;
  margin-bottom: 12px;
}

.profile-id {
  font-size: 14px;
  color: #777;
}

.profile-info {
  margin-top: 30px;
  text-align: left;
}

.info-item {
  margin-bottom: 20px;
  font-size: 18px;
  color: #333;
}

.info-item label {
  font-weight: bold;
  color: #1e80b7; 
}

.info-item span {
  font-size: 16px;
  color: #555;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #1e80b7;
    color: white;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #e0f7fa;
}

  .sidebar {
    width: 270px;
    background-color: #1d3557;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: fixed;
    height: 100%;
    padding: 20px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
  }

  .content {
    margin-left: 270px;
    padding: 60px;
    flex: 1;
    background-color: #ffffff;
    background-image: linear-gradient(135deg, #e2eff9, #dce5f0);
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px; 
    transition: background-color 0.3s ease, transform 0.3s ease; 
  }
  .content:hover {
    transform: scale(1.02);
  }
  .section {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
  }
  .page-title {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    color: #1d3557; 
    margin-bottom: 40px;
  }
  .profile-container {
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    padding: 40px;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    border-top: 5px solid #1e80b7; 
  }
  .profile-header {
    margin-bottom: 25px;
  }
  .profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #4d80b0;
    margin-bottom: 20px;
  }
  .profile-name {
    font-size: 26px;
    color: #1d3557; 
    font-weight: bold;
    margin-bottom: 12px;
  }
  .profile-id {
    font-size: 14px;
    color: #777;
  }
  .profile-info {
    margin-top: 30px;
    text-align: left;
  }
  .info-item {
    margin-bottom: 20px;
    font-size: 18px;
    color: #333;
  }
  .info-item label {
    font-weight: bold;
    color: #1e80b7; 
  }
  .info-item span {
    font-size: 16px;
    color: #555;
  }
  table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }
  table th, table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
  }
  table th {
    background-color: #1e80b7;
    color: white;
    font-weight: bold;
  }
  table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  table tr:hover {
    background-color: #f1f1f1;
  }
  .form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px;
  }
  .form-group label {
    font-size: 16px;
    color: #1d3557;
  }
  .form-group input, .form-group select, .form-group textarea {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
  }
  .form-group textarea {
    resize: vertical;
  }
  .btn-success {
    background-color: #1e80b7;
    border-color: #1e80b7;
    color: white;
    font-weight: bold;
  }

  .btn-success:hover {
    background-color: #155d7d;
    border-color: #155d7d;
  }

  </style>
</head>
<body>

<!-- Sidebar -->
  <div class="sidebar">
    <div class="brand">
    <i class="fas fa-graduation-cap"></i> monPortail
    </div>
    <div class="menu">
      <a data-section="dashboard" class="active"><i class="fas fa-user-tie"></i> Profil</a>
      <a data-section="Requests"><i class="fas fa-paper-plane"></i> Requests</a>
      <a data-section="Document Application"><i class="fas fa-pen"></i> Document Application</a>
    </div>
    <div class="footer">
      <div>
        <span>Faculty of Science</span>
      </div>
    </div>
  </div>

<!-- Main Content -->
<div class="content">

  <div id="dashboard" class="section active">
  <h1 class="page-title">Your Profile</h1>
  <div class="profile-container">
    <div class="profile-header">
      <img src="images/student.png" class="profile-photo" alt="Profile Photo">
      <h2 class="profile-name"><?php echo htmlspecialchars($profile['nom'] . ' ' . $profile['prenom']); ?></h2>
      <p class="profile-id"><strong>Matricule:</strong> <?php echo htmlspecialchars($profile['matricule']); ?></p>
    </div>

    <div class="profile-info">
      <div class="info-item">
        <label>Group:</label>
        <span><?php echo htmlspecialchars($profile['groupe']); ?></span>
      </div>
      <div class="info-item">
        <label>Email:</label>
        <span><?php echo htmlspecialchars($profile['email']); ?></span>
      </div>
      <div class="info-item">
        <label>Level:</label>
        <span><?php echo htmlspecialchars($profile['niveau']); ?></span>
      </div>
      <div class="info-item">
        <label>Specialization:</label>
        <span><?php echo htmlspecialchars($profile['specialites']); ?></span>
      </div>
    </div>

  </div>
  </div>
<!-- section display requests -->

    <div id="Requests" class="section">

      <h1>Your Requests </h1>
      <p>Here are your submitted requests. Please note that it may take 3 to 7 days to receive a response. </p>
      <table class="table table-border text-center">
                    <tr class="bg-dark text-white ">
                        <td><strong>N°</strong></td>
                        <td><strong>Full name</strong></td>
                        <td><strong>Group</strong></td>
                        <td><strong>Document Type</strong></td>
                        <td><strong>Status</strong></td> 
                    </tr>
                    <tbody>
                    <?php 
                       $data=$std->getDemande($matricule);
                        foreach ($data as $key => $val) {
                           echo "<tr>
                               <td>" . ($key + 1) . "</td>
                               <td>$val[nom] $val[prenom]</td>
                               <td>$val[groupe]</td>
                               <td>$val[type_doc]</td>
                               <td>$val[status]</td>
                           </tr>";
                        }
                    ?>
                    </tbody>
      </table>
  </div>

<!-- section display requests -->
    <div id="Document Application" class="section">
      <h1>Document Application</h1>
      <p>Here, you can formally request official documents directly through the system.</p>
      <form class="form-horizontal" method="post" action="../../Controler/student.php">
        <div style="margin: 70px 50px 20px 50px;; width: 80%;">
       <h4>Fill Your Information Here!</h4>
          <!-- Matricule -->
          <div class="form-group mt-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" placeholder="Enter your ID..." name="matricule" required>
          </div>
          <!-- Nom -->
          <div class="form-group mt-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter your last name..." name="nom" required>
          </div>
          <!-- prenom -->
          <div class="form-group mt-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter your first name..." name="prenom" required>
          </div>
          <!-- Groupe -->
          <div class="form-group mt-3">
            <label class="form-label">Group</label>
            <input type="text" class="form-control" placeholder="Enter your group..." name="groupe" required>
          </div>
          <!-- Niveau -->
          <div class="form-group mt-3">
            <label class="form-label">Level</label>
            <select class="form-select" aria-label="Default select example" name="niveau" id="NiveauSelect" onchange="showTextarea()">
              <option value="L1">L1</option>
              <option value="L2">L2</option>
              <option value="L3">L3</option>
              <option value="M1">M1</option>
              <option value="M2">M2</option>
            </select>
          </div>
          <!-- Spécialités -->
          <div class="form-group mt-3">
            <label class="form-label">Specialization</label>
            <select class="form-select" aria-label="Default select example" name="specialites" id="specialitesSelect">
              <option value="INFO">INFO</option>
              <option value="ISIL">ISIL</option>
              <option value="SI">SI</option>
              <option value="IT">IT</option>
            </select>
          </div>
          <!-- Année scolaire -->
          <div class="form-group mt-3">
            <label class="form-label">Academic Year</label>
            <input type="text" class="form-control" placeholder="2024-2025" name="annee_scolaire" required>
          </div>
          <!-- Type Document -->
          <div class="form-group mt-3">
            <label class="form-label">Document Type</label>
            <select class="form-select" aria-label="Default select example" name="type_doc" id="typeDocSelect" onchange="showTextarea()">
              <option value="Certificat de scolarité">Certificate of Enrollment</option>
              <option value="Attestation de bonne conduite">Certificate of Good Conduct</option>
              <option value="Relevé de notes">Transcript</option>
              <option value="Autre">Other</option>
            </select>
          </div>
          <!-- Autre Textarea -->
          <div class="form-group mt-3" id="otherTextArea" style="display: none;">
            <label for="otherDetails" class="form-label">Please specify:</label>
            <textarea class="form-control" id="otherDetails" name="other_doc" rows="3" placeholder="Specify here..."></textarea>
          </div>
          <!-- Submit Button -->
          <div class="form-group mt-3 text-center">
            <button type="submit" style="background: #1e80b7; border-color:#1e80b7" class="btn btn-success" name="Envoyer">Send</button>
          </div>
        </div>
      </form>
    </div>

</div>




  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
  <script>
    // js fucntion for switching between sections 
    document.addEventListener("DOMContentLoaded", () => {
      const menuLinks = document.querySelectorAll(".menu a");
      const sections = document.querySelectorAll(".section");

      menuLinks.forEach(link => {
        link.addEventListener("click", () => { 
          menuLinks.forEach(item => item.classList.remove("active"));
          link.classList.add("active");
          sections.forEach(section => section.classList.remove("active"));
          const target = link.getAttribute("data-section");
          document.getElementById(target).classList.add("active");
        });
      });
    });

// js fucntion for testarea "type document"
    function showTextarea() {
       const select = document.getElementById("typeDocSelect");
       const textAreaDiv = document.getElementById("otherTextArea");
       textAreaDiv.style.display = select.value === "Autre" ? "block" : "none";
    }
</script>
</body>
</html>
