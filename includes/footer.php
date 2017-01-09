<?php
if (!defined('JUMP'))
  define("JUMP", '');
?>
<footer class="page-footer blue lighten-2">
  <div class="container">
    <div class="row">
      <a name="contact"></a>
      <div class="col s3 center-align">
        <a class="white-text" href="https://github.com/csescholarsum" target="_blank"><i class="fa fa-github"></i></a>
      </div>
      <div class="col s3 center-align">
        <a class="white-text" href="mailto:code-m-board@umich.edu"><i class="fa fa-envelope"></i></a>
      </div>
      <div class="col s3 center-align">
        <a class="white-text" href="https://twitter.com/CodeMUmich" target="_blank"><i class="fa fa-twitter"></i></a>
      </div>
      <div class="col s3 center-align">
        <a class="white-text" href="https://www.facebook.com/CodeMUmich" target="_blank"><i class="fa fa-facebook-square"></i></a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      (C) 2016 Code-M.
    </div>
  </div>
</footer>

<!--  Scripts-->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="<?php echo JUMP; ?>static/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script src="static/js/main.js"></script>
<?php if (CURRENT_PAGE == 'Event Submission') echo "<script src='" . JUMP . "static/js/submitEvent.js'></script>"; ?>

</body>
</html>