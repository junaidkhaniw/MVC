<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <?php if (!$this->getSession('userId')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/userController">Reister</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/userController/loginUserController">Login</a>
          </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/postController/createPostController">Add Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/postController/index">View Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/userController/viewUserController">View Users</a>
            </li>
        <?php endif; ?>
      </ul>     
      <?php if ($this->getSession('userId')) : ?>
        <ul class="my-2 my-lg-0"><a href="<?php echo URLROOT; ?>/profile/logout" class="btn btn-success">Logout</a></ul>
      <?php endif; ?>
    </div>
  </div>
</nav>