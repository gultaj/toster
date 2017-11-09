<div class="user-summary">
	<a href="{{ route('user', ['nickname' => $user->nickname]) }}" class="user-summary__avatar"><img src="{{ url($user->avatar) }}"></a>
	<div class="user-summary__desc">
		<a href="{{ route('user', ['nickname' => $user->nickname]) }}" class="user-summary__name">{{ $user->full_name }}</a>
		<span class="user-summary__nickname">{{ '@' . $user->nickname }}</span>
		<div class="user-summary__about">{{ $user->about }}</div>
	</div>
</div>