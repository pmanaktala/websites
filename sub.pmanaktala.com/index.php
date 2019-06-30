<!DOCTYPE html>
<html>
<head>
<title>Subjects</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111404436-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111404436-3');
</script>

</head>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}
</style>
<body>
<div class="w3-container w3-display-middle">
    <div class="w3-card-4">
    <header class="w3-container w3-red">
      <h1>Welcome</h1>
    </header>

    <div class="w3-container">
This website will help you sort the subjects based on your input.<br>
<form action="view.php" method="post">
Slot : 

  <select name="slot">
    <option value="all">ALL</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
    <option value="E">E</option>
    <option value="F">F</option>
    <option value="G">G</option>
  </select>
  <br>
  
Subject type :

<select name="type">
    <option value="all">ALL</option>
    <option value="Core">Core</option>
    <option value="Elective">Elective</option>
    <option value="Open Elective">Open Elective</option>
  </select>
  <br>
  <input type="submit" style="margin-bottom:5px;">
  <br>
</form>
    </div>

    <footer class="w3-container w3-red">
      <h5>Note: All the results are based on the table in academia. Please cross check once for surity.<br> I am not responsible for anything that goes wrong.</h5>
    </footer>
  </div>
  </div>
  
  <div class="footer">
  <p><a href="http://pmanaktala.com">Designed by pmanaktala</a></p>
</div>

</body>
</html>
