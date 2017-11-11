<template>
    <li class="list-content__item comment_form">
        <form :id="commentName + '_comments_id'" 
              class="form_comments" 
              method="post">
            <input type="hidden" :name="commentName + '_id'" :value="typeId">
            <div class="field">
                <textarea rows="1" name="body" class="comment__field" v-model="newComment"></textarea>
            </div>
            <div class="form__buttons">
                <input type="submit" class="form__submit">
            </div>
        </form>
    </li>
</template>
<script>
export default {
    props: ['commentType', 'typeId', 'actionUrl'],
    data() {
        return {
            newComment: '',
            csrfToken: App.csrfToken
        }
    },
    computed: {
        commentName() {
            return this.commentType || 'answer';
        }
    }
}
</script>

