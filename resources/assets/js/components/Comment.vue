<template>
    <li class="list-content__item comment">
        <div class="comment__header">
            <div class="user-summary user-summary_comment">
                <div class="user-summary user-summary_comment">
                    <a :href="comment.user.profile_url" class="user-summary__avatar">
                        <img :src="comment.user.avatar_url">
                    </a>
                    <div class="user-summary__desc">
                        <a :href="comment.user.profile_url" class="user-summary__name">
                            {{ comment.user.full_name }}
                        </a>
                        <span class="user-summary__nickname">{{ '@' + comment.user.nickname }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="comment__body">
            <div class="comment__body_inner">
                <div class="comment__text">{{ comment.body }}</div>
                <div class="comment__date">Написано {{ comment.created_at }}</div>
                <div class="button-group button-group_comment"><a href="#" class="btn_answer">Ответить</a>
                    <div class="dropdown dropdown_settings">
                        <button class="btn btn_settings btn_dott"></button>
                    </div>
                </div>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    props: ['data'],

    data() {
        return {
            comment: this.data
        }
    } 
    
}
</script>

