<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Kingticle - Home Get Latest Articles Here">
  <meta name="author" content="">
  <!-- Favicon -->
  <link rel="icon" href="img/icon.png">

  <title>Kingticle - Home | Get Latest Articles Here</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">
  <style>
    .title a:hover{
      text-decoration: none;
      color: #4d0e02;
      text-align: center;
      transition: .5s ease-in-out;
    }
  </style>

</head>

<body>
  <div id="root">
  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
      <a class="btn btn-primary" href="#">Like Us</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Read Current News, Creative Articles and Get Informed</h1>
        </div>
        
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
    <div class="alert alert-success" v-if="successMessage">{{ successMessage}}</div>
      <div class="alert alert-danger" v-if="errorMessage">{{ errorMessage}}</div>

      <div class="row">
      
        <div class="col-lg-3" v-for="article in articles">
          <div class="card card-body">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">

          <img v-if="article.image_url" class="img-fluid rounded-circle mb-3" :src="article.image_url" alt="" style="height:200px; width:200px;">
          <img v-else class="img-fluid rounded-circle mb-3" src="img/noimage.png" alt=""  style="height:200px; width:200px;">
            <h4 class="title"><a target="_blank" :href="article.body_url">{{article.title}}</a></h4>
            <p>Date:  {{formatDate(article.created_at)}} </p>
            
          </div>
        </div>
        </div>

       
    </div>
  </section>

 

 
  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="about.php">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">+234 (0)81 679 27876</a>
            </li>
            
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="" data-toggle="modal" data-target="#postArticle">Post Article</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Kingticle 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


  <!-- POST MODAL -->
 

<!-- Modal -->
<div class="modal fade" id="postArticle" tabindex="-1" role="dialog" aria-labelledby="postArticleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postArticleLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="form-group">
            <input type="text" placeholder="Enter Title" class="form-control" v-model="newArticle.title">
            <input type="text" placeholder="Enter body_url" class="form-control" v-model="newArticle.body_url">
            <input type="text" placeholder="Enter image_url" class="form-control" v-model="newArticle.image_url">
    <hr>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="saveArticle()">Post Article</button>
        </form>

        
      </div>
    </div>
  </div>
</div>
<!-- end moda -->

</div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/vue.js"></script>
  <script src="js/axios.js"></script>
  <script src="js/app.js"></script>

</body>

</html>
