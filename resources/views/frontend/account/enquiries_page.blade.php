<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title', ($pageTitle ?? 'My Account') . ' - Astroduniya')
@section('description', $pageTitle ?? 'My Account')
@section('keywords', 'My Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Account";
	$toolbar_title=($pageTitle ?? "My Account");
?>
<!-- /toolbar page title -->

@section('content')
@include('frontend.layouts.subnav')

@php
    $quickLinks = [
        ['label' => 'All Requests', 'url' => url('/myaccount/querystatus')],
        ['label' => 'Reports', 'url' => url('/myaccount/report')],
        ['label' => 'Astrologer Booking', 'url' => url('/myaccount/astrologerbooking')],
        ['label' => 'Gemstone', 'url' => url('/myaccount/gemstonesuggestion')],
        ['label' => 'Panditji', 'url' => url('/myaccount/bookpanditJi')],
        ['label' => 'Vastu', 'url' => url('/myaccount/vastu-specific')],
        ['label' => 'Orders', 'url' => url('/myaccount/orders')],
        ['label' => 'Account Settings', 'url' => url('/myaccount/setting')],
    ];
@endphp

<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mb--60">
				@include('frontend.account.sidebar.sidebar')
			</div>

			<div class="col-12 col-sm-12 col-md-12 col-lg-9">
				<div class="portlet">
					<div class="portlet-header border-bottom">
						<div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
							<div>
								<span class="d-block text-muted text-truncate font-weight-medium pt-1">
									{{ $pageSubtitle ?? '' }}
								</span>
								<div class="fs--13 text-muted">
									Track every request, the latest status, and the most recent reply.
								</div>
							</div>
							<div class="d-flex gap-2 flex-wrap">
								<a href="{{ route('logout') }}" class="btn btn-sm btn-outline-secondary">Logout</a>
							</div>
						</div>
					</div>

					<div class="portlet-body pt-0">
						<div class="row g-2 mb-4 mt-2">
							@foreach($quickLinks as $link)
								<div class="col-6 col-lg-3">
									<a href="{{ $link['url'] }}" class="btn btn-light border w-100 text-start">
										{{ $link['label'] }}
									</a>
								</div>
							@endforeach
						</div>

						<div class="table-responsive">
							<table class="table table-align-middle border-bottom mb-6">
								<thead>
									<tr class="text-muted fs--13">
										<th style="min-width: 110px;">Request / Order ID</th>
										<th style="min-width: 180px;">Request Type</th>
										<th style="min-width: 170px;">Submission Date</th>
										<th style="min-width: 170px;">Current Status</th>
										<th style="min-width: 280px;">User Query Details</th>
										<th style="min-width: 280px;">Admin / Pandit Response</th>
										<th style="min-width: 170px;">Last Updated</th>
										<th style="width: 90px;"></th>
									</tr>
								</thead>
								<tbody>
									@forelse($enquiries as $e)
										@php
											$statusStyles = match ($e->current_status_label) {
												'Answered' => ['bg' => '#e8f8ee', 'color' => '#146c43', 'border' => '#bfe8cc'],
												'Awaiting Admin Response' => ['bg' => '#fff4db', 'color' => '#8a6100', 'border' => '#ffe19a'],
												'Received' => ['bg' => '#e8f1ff', 'color' => '#0d47a1', 'border' => '#c6d8ff'],
												default => ['bg' => '#f1f3f5', 'color' => '#343a40', 'border' => '#d6d8db'],
											};
											$latestAdminReply = collect($e->replies ?? [])
												->sortByDesc('created_at')
												->firstWhere('sender_type', 'admin');
										@endphp
										<tr class="text-muted">
											<td>
												<a class="font-weight-medium text-dark" href="{{ route('account.enquiries.show', $e) }}">
													#{{ $e->id }}
												</a>
											</td>
											<td>
												<div class="font-weight-medium text-dark">{{ $e->request_type_label }}</div>
												<div class="fs--13 text-muted">{{ $e->source ?: '-' }}</div>
											</td>
											<td>{{ optional($e->created_at)->format('M d, Y h:i A') }}</td>
											<td>
												<span class="d-inline-block px-3 py-2 rounded-pill small font-weight-bold" style="background: {{ $statusStyles['bg'] }}; color: {{ $statusStyles['color'] }}; border: 1px solid {{ $statusStyles['border'] }};">
													{{ $e->current_status_label }}
												</span>
											</td>
											<td>
												<div class="font-weight-medium text-dark">{{ $e->subject ?: '-' }}</div>
												@if($e->message)
													<div class="fs--13 text-muted mt-1">{{ \Illuminate\Support\Str::limit($e->message, 120) }}</div>
												@endif
												@if(!empty($e->meta))
													<div class="fs--12 text-muted mt-1">
														{{ \Illuminate\Support\Str::limit(json_encode($e->meta, JSON_UNESCAPED_SLASHES), 120) }}
													</div>
												@endif
											</td>
											<td>
												@if($latestAdminReply?->body)
													<div class="fs--13 text-dark">{{ \Illuminate\Support\Str::limit($latestAdminReply->body, 140) }}</div>
												@elseif($latestAdminReply?->payment_url)
													<div class="fs--13 text-dark">
														Payment link: <a href="{{ $latestAdminReply->payment_url }}" target="_blank" rel="noopener noreferrer">{{ \Illuminate\Support\Str::limit($latestAdminReply->payment_url, 120) }}</a>
													</div>
												@elseif($latestAdminReply?->attachment_path)
													<div class="fs--13 text-dark">
														Attachment:
														<a href="{{ $latestAdminReply->attachment_url }}" target="_blank" rel="noopener noreferrer">
															{{ $latestAdminReply->attachment_original_name ?: 'Download' }}
														</a>
														@if($latestAdminReply->attachment_is_image && $latestAdminReply->attachment_url)
															<div class="mt-2">
																<img src="{{ $latestAdminReply->attachment_url }}" alt="Attachment preview" class="img-fluid rounded border" style="max-width: 220px;">
															</div>
														@endif
													</div>
												@else
													<div class="fs--13 text-muted">No admin/pandit response yet.</div>
												@endif
											</td>
											<td>{{ optional($e->last_updated_at)->format('M d, Y h:i A') ?: '-' }}</td>
											<td>
												<a class="btn btn-sm btn-outline-secondary" href="{{ route('account.enquiries.show', $e) }}">View</a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="8" class="text-secondary">
												No requests found yet.
											</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>

						<div class="d-flex justify-content-end">
							{{ $enquiries->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
