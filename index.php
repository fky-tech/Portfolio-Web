<?php

require_once 'contacts.php';
require_once 'projects.php';

$project = new Projects();
$result = $project->getProjects();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $contact = new Contacts();
    $result = $contact->insert($name, $email, $subject, $message);

    if ($result == "Success") {
      ?>
      <script>
        alert("Thanks for your message");
      </script>
      <?php
      // echo "Thanks for your message";
    } else {
      $error = $result;
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script>
      const mediaQuery = window.matchMedia("(max-width: 768px)");
        const mediaQ = window.matchMedia("(min-width: 769px)");
        function toggleMenu() {
            var navMenu = document.querySelector(".navMenu");
            navMenu.style.display = "none";
            if (navMenu.style.display === "block") {
              navMenu.style.display = "none";
              if (mediaQ) {
                navMenu.style.display = "block";
              }
            } else {
              navMenu.style.display = "block";
            }
      }
      function navLinks(e) {
        if (e.matches) {
          var navMenu = document.querySelector(".navMenu");
          navMenu.style.display = "none";
        }
      }
    </script>
</head>
<body>
  <header>
    <div class="header">
      <div class="logo">
        <img src="images/logo.png" alt="" width="70px" height="60px">
      </div>
      <div class="toggle-button" onclick="toggleMenu()">
          <span class="bar"></span>
          <span class="bar"></span> 
          <span class="bar"></span>
      </div>
      <nav class="navMenu">
        <ul>
          <li>
            <a class="links" onclick="navLinks(mediaQuery)" href="#home">Home</a>
          </li>
          <li>
            <a class="links" onclick="navLinks(mediaQuery)" href="#about-me">About</a>
          </li>
          <li>
            <a class="links" onclick="navLinks(mediaQuery)" href="#projects">Projects</a>
          </li>
          <li>
            <a class="links" onclick="navLinks(mediaQuery)" href="#contact-me">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section id="home">
      <div class="home">
        <div class="desc">
          <div class="desc-txt">
            <h2 class="hello-h">Hello!</h2>
            <p class="hello-p">I'm Fikreyohannes Biruk</p>
            <p class="hello-desc">Web developer</p>
          </div>
          <div>
            <a href="#projects">My Works</a>
          </div>
        </div>
        <div>
          <img src="images/rb_3863.png" alt="" width="500px" height="350px">
        </div>
      </div>
    </section>
    <section id="about-me">
      <div class="about">
        <h1 class="about-h">About me</h1>
        <p class="about-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Incidunt, magni. Dolores voluptatum nulla facere doloremque laudantium ducimus.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Incidunt, magni. Dolores voluptatum nulla facere doloremque laudantium ducimus.
        </p>
        <a href="#contact-me" class="about-a">Let's connect</a>
      </div>
    </section>
    <section id="projects">
      <div class="projects">
        <h1>Projects</h1>
        <div class="projects-desc">
          <?php
          foreach ($result as $row) {
            ?>
              <div class="projects-div">
                <img src="<?php echo $row['image']?>" alt="" height="230">
                <h1><?php echo $row['title']?></h1>
                <p><?php echo $row['description']?></p>
                <a href="<?php echo $row['link']?>">View</a>
              </div>
            <?php
          }
          ?>
        </div>
      </div>
    </section>
    <section id="contact-me">
      <div class="contact">
        <h1 class="contact-h">Contact Me</h1>
        <div class="contact-div">
          <div  class="contacts-div1">
            <ul class="contact-li">
              <li>
                <h1>Address</h1>
                <address>Addis Ababa, Ethiopia</address>
              </li>
              <li>
                <h1>email</h1>
                <p>fikreyohannesbiruk@gmail.com</p>
              </li>
              <li>
                <h1>Phone</h1>
                <p>+251999077554</p>
              </li>
            </ul>
          </div>
          <div class="contact-msg">
            <form method="post" class="contact-form">
              <div>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
              </div>
              <div>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
              </div>
              <div>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
              </div>
              <div>
                 <textarea name="message" id="message" rows="10" placeholder="Your Message" required></textarea>
              </div>
              <button type="submit" name="submit">Send Message</button>
            </form>
          </div>
        </div>
        <div class="contact-addr">
          <div class="contact-desc">
            <h1>Fikreyohannes Biruk</h1>
            <p>Web developer</p>
          </div>
          <ul class="contact-icons">
            <li>
              <a href="/">
                <img src="images/github (1).png" alt="" width="28" height="28">
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/linkedin.png" alt="" width="28" height="28">
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/mail.png" alt="" width="28" height="28">
              </a>
            </li>
            <li>
              <a href="/">
                <img src="images/instagram (1).png" alt="" width="28" height="28">
              </a>
            </li>
          </ul>
          <div>
            <p>© 2024 All rights reserved.</p>
            <p>Designed & Built by Fikreyohannes Biruk</p>
          </div>
        </div>
      </div>
    </section>
  </main>
</body> 
</html>