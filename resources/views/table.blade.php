<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			.table 
			{
				color: #000;
				background-color: #fffeef;
				border: solid 2px black;
				margin: 5px;
				padding: 10px;
				justify-content: center;
			}
        </style>
    </head>
    <body>
	</br></br>
        <div class = "links"><a href ="/laravel/public">Laravel</a></div>
		</br>
      <table class = "table"><tr class = "table" id = "headertable">
		<td class = "table">icon</td>
		<td class = "table">date</td>
		<td class = "table">name</td>
		<td class = "table">phone</td>
		<td class = "table" >email</td>
		</tr>
            @foreach($leadsTable as $item)
			 <tr onclick = "verticaltable(this)" id = "{{ $item->sphere_id }}"><td class = "table"></td> 
			 <td class = "table">{{ $item->date }}</td>
			 <td class = "table">{{ $item->name }}</td>
			 <td class = "table">{{ $item->phone }}</td>
			 <td class = "table">{{ $item->email }}</td></tr>
            @endforeach
			</table>
			<table id = "vertical">
			
			</table>
                <div class="links">
				    <a href = "table">Отобразить таблицу</a>
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
		  <script type="text/javascript" src="{{ asset('assets/web/js/lmcrm.ajax.js') }}"></script>
		  <script type="text/javascript" src="{{ asset('components/jquery/jquery-2.min.js') }}"></script>
  <!-- Bootstrap Core JavaScript -->
  <script type="text/javascript" src="{{ asset('components/bootstrap/js/bootstrap.min.js') }}"></script>
		<script>
		function verticaltable(tr)
		{
			var id = $(tr).attr('id');
			var tbody = document.getElementById('vertical');
			var datetable = tr.getElementsByTagName("td");
			var ht = document.getElementById('headertable');
			var headertable = ht.getElementsByTagName("td");
			alert('id = ' + id + ', name - ' + datetable['2'].innerHTML);
			$.ajax({
				type: 'post',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url: 'vertical',
					data: {
						id: id
						},
						success: function(data) {
	   for (var i = 0; i < datetable.length; i++)
	   {
		   var newRow = tbody.insertRow(i);
		   var newCell1 = newRow.insertCell(0);
		   newCell1.innerHTML = headertable[i].innerHTML;
		   var newCell2 = newRow.insertCell(1);
		   newCell2.innerHTML = datetable[i].innerHTML;
		   newCell1.setAttribute('class', "table");
		   newCell2.setAttribute('class', "table");
	   }		   
	   tbody.innerHTML += data;
      }
  });
}
	
		</script>
    </body>
</html>
