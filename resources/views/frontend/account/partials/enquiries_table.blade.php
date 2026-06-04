<div class="table-responsive">
	<table class="table table-align-middle border-bottom mb-6">
		<thead>
			<tr class="text-muted fs--13">
				<th><span class="px-2 p-0-xs">SUBJECT</span></th>
				<th class="w--200 hidden-lg-down">CONTEXT</th>
				<th class="w--200 hidden-lg-down">DATE</th>
				<th class="w--200 hidden-lg-down">STATUS</th>
			</tr>
		</thead>
		<tbody>
			@forelse($enquiries as $e)
				<tr class="text-muted">
					<td>
						<span class="font-weight-medium text-dark mx-2 m-0-xs">
							{{ $e->subject ?: 'Enquiry #' . $e->id }}
						</span>
						<div class="fs--13 d-block d-xl-none">
							<span class="d-block text-muted">{{ optional($e->created_at)->format('M d, Y H:i') }}</span>
							<span class="d-block font-weight-medium">{{ $e->context ?: ($e->source ?: '-') }}</span>
						</div>
						@if($e->message)
							<div class="fs--13 text-muted px-2 mt-1">
								{{ \Illuminate\Support\Str::limit($e->message, 90) }}
							</div>
						@endif
					</td>
					<td class="hidden-lg-down">{{ $e->context ?: ($e->source ?: '-') }}</td>
					<td class="hidden-lg-down">{{ optional($e->created_at)->format('M d, Y H:i') }}</td>
					<td class="hidden-lg-down">Received</td>
				</tr>
			@empty
				<tr>
					<td colspan="4" class="text-secondary">No records found.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>

<div class="d-flex justify-content-end">
	{{ $enquiries->links() }}
</div>

