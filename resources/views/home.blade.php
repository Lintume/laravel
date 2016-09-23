@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Vocabulary</div>

				<div class="panel-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>
									word
								</th>
							</tr>
						</thead>
						<tbody class = "table_body">
						@foreach($words as $word)
							<tr class = "popup_hash" data-word_id = "{{$word->id}}" data-hash = "{{json_encode($word->hashes())}}" >
								<td class = "text_word">
									{!! $word->word !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){

		$('.table_body').on('click', '.popup_hash', function (event) {
			$("#myModal").modal();
			$(".pop_table").empty();
			var row = $(this).closest('tr');
			var json_hashes = row.data('hash');
			//console.log(json_hashes);
			for (var algorithm in json_hashes)
				{
					var hidden_row = $('table tr.hidden').clone();
					var hash = json_hashes[algorithm];
					var substr = hash.substr(0, 30);
					hidden_row.find('.hash').text(substr);
					hidden_row.find('.algorithm').text(algorithm);
					hidden_row.find('.actions').data('wordid', row.data('word_id'));
					hidden_row.removeClass('hidden');

					$('.pop_table').append(hidden_row);
				}

				$('#myModal .modal-header h4').text(row.find('.text_word').text());
			});

		$('.pop_table').on('click', '.actions', function (event) {
			var row = $(this).closest('tr');
			$.ajax({
				url: '/hash',
				method: "POST",
				data: { word_id: $('.actions').eq(2).data('wordid'), hash: row.find('.hash').text(), word:$('#myModal .modal-header h4').text(), algorithm: row.find('.algorithm').text()},
				success: function(response){ // What to do if we succeed
					console.log(response);
				},
				error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			});
		});
	});
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	.modal-header, h4, .close {
		background-color: #5cb85c;
		color:white !important;
		text-align: center;
		font-size: 30px;
	}
	.modal-footer {
		background-color: #f9f9f9;
	}

</style>

<div class="container">
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="padding:35px 40px;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4></h4>
				</div>
				<div class="modal-body" style="padding:40px 50px;">
						<table class="table table-responsive">
							<thead>
							<tr class = "hidden">
								<td class = "algorithm"></td>
								<td class = "hash">
									<div style="width: 500px; word-wrap: break-word;"></div>
								</td>
								<td class = "actions">
									<button class="btn btn-default">save</button>
								</td>
							</tr>
							</thead>
							<tbody class = "pop_table">
							</tbody>
						</table>
						<div class="container">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
