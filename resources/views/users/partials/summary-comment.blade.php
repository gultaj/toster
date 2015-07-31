<div class="user-summary user-summary_comment">
	<a href="{{ route('user', ['nickname' => $user->nickname]) }}" class="user-summary__avatar"><img src="{{ url($user->avatar) }}"></a>
	<div class="user-summary__desc">
		<a href="{{ route('user', ['nickname' => $user->nickname]) }}" class="user-summary__name">{{ $user->full_name }}</a>
		<span class="user-summary__nickname">{{ '@' . $user->nickname }}</span>
	</div>
</div>