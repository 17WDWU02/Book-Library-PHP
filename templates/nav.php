<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./index.php">Book Library</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if($currentPage == ""):?>active<?php endif; ?>"><a href="index.php">View Book</a></li>
        <li class="<?php if($currentPage == "Authors"):?>active<?php endif; ?>"><a href="authors.php">View Authors</a></li>
      </ul>
    </div>
  </div>
</nav>