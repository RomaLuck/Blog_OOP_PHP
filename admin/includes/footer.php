  </div>
  <!-- /#wrapper -->
  
  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 300
      });
    });
  </script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Views',     <?php echo $session->count;?>],
        ['Comments',  <?php echo Comment::count_all();?>],
        ['Users',     <?php echo User_db::count_all();?>],
        ['Photos',    <?php echo Photo_db::count_all();?>]

      ]);

      var options = {
        legent: 'none',
        pieSliceText: 'label',
        title: 'My Daily Activities',
        backgroundColor: 'transparent'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  </html>

  </body>

  </html>