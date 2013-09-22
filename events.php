<!DOCTYPE html>
<html>
  <head>
    <title><%=title%></title>
	<link rel="stylesheet" type="text/css" href="stylesheets/default.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/events.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/modals.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>    
    <script src="scripts/modals.js"></script> 

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        overflow: auto;
      }

    </style>
  </head>

<body style="margin:0;min-width: 1100px;">

<?php
	$m = new MongoClient();
	$db = $m->hack;
	$collection = $db->tokens;
	
	$tokenQ = array('value' => $_COOKIE['token']);
	$cursor = iterator_to_array($collection->find($tokenQ, array('_id' => 0, 'user' => true)));
	
	if (!count($cursor)) {
		header( 'Location: index.php');
	}
	else {
		$user = $cursor[0]['user'];
	}
?>

  <a href="" id="head">
    Current Events
  </a>

  
  <p id="listLabel">
    Event List
  </p>
  <ul class="list">
<?php
	$collection = $db->events;
	$cursor = $collection->find();
	foreach ($cursor as $events) {
		echo '<li class="eventItem"><a href=people.php?id=' . $events["_id"] . '>' . $events["title"] . "</a></li>\n";
	}
?>
  </ul> 
  <br>
  <div id="buttonDiv">
    <a data-toggle="modal" href="#myModal" class="button" style="text-decoration:none;">Create New Event</a>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" data-dismiss="modal" aria-hidden="true" style="cursor:pointer;">&times;</button>
          <p class="modal-title">Create a New Event</p>
        </div>
        <div class="modal-body">
          <form class="createForm" action="POST">
            <input type="text" class="input" placeholder="Event Name"/>
            <br><br>    
			<input type="text" class="input" placeholder="Description"/>
            <br><br>   
            <input type="number" class="input" min="0" placeholder="Max Team Capacity"/>
            <br><br>
            <input type="submit" class="button" value="Create" style="float:left;margin-left:180px;"/>
          </form>    
        </div>
        <div class="modal-footer">
          <button class="red" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</body>

</html>