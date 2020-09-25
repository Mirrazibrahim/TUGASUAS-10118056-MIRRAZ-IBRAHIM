  <?php
   function get_curl($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result,true);
  }

  $result = get_curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCi8e0iOVk1fEOogdfu4YgfA&key=AIzaSyCcbRDn_Qf6dXpFDsY2w_dCTTveoIVyXFk&  ');

  $youtubeProfilePict = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $subscriber = $result['items'][0]['statistics']['subscriberCount'];

  $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCcbRDn_Qf6dXpFDsY2w_dCTTveoIVyXFk&part=snippet&maxResults=1&order=relevance&channelId=UCi8e0iOVk1fEOogdfu4YgfA';
  $result = get_curl($urlLatestVideo);
  $urlLatestVideo = $result['items'][0]['id']['videoId'];
  
?>
<!doctype html>
<html lang="en">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>MIB Movie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
		<div class="container">
		<a class="navbar-brand" href="">MIB MOVIE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			</div>
		</div>
    </nav>
    
    <div class="container">

        <div class="row mt-3">
            <div class="col">
                <h1>Search Movie</h1>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Movie title.." id="search-input">
                    <div class="input-group-append">
                      <button class="btn btn-info" type="button" id="search-button">Search</button>
                    </div>
                  </div>
            </div>
            
        </div>

        <hr>

        <div class="row" id="movie-list">

        </div>

    </div>
   

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <d class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Movie Search</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class='row justify-content-center'>
          <div class='col-md-4'>
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePict; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $channelName; ?></h5>
                <p><?= $subscriber; ?></p>
              </div>
            </div>
          </div>
          <div class='col-md-5'></div>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $urlLatestVideo ?>" allowfullscreen></iframe>
        </div>
      </div>
      
      </div>
    </div>
  </div>


<<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script>
<script src='js/script1.js'></script>
</body>
</html>