<template>
    <ul class="list-content list-content_comments">
        <div v-for="comment in comments" :key="comment.id">
            <comment :data="comment"></comment>
        </div>
        <comment-form :commentType="this.commentType" :typeId="typeId"></comment-form>
	</ul>
</template>

<script>
import Comment from './Comment.vue';
import CommentForm from './CommentForm.vue';

export default {
    components: {Comment, CommentForm},
    props: ['data', 'commentType', 'typeId'],
    data () {
        return {
            comments: this.data
        }
    }
}
</script>
