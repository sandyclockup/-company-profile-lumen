<template>
    <div :class="getClasses(comment)">
        <div class="flex-shrink-0">
            <img class="rounded-circle" width="50" :src="comment.user.gender === 'M' ? '/male.png' : '/female.png'" alt="..." />
        </div>
        <div class="ms-3">
            <div class="fw-bold">{{ comment.user.first_name }} {{ comment.user.last_name }}</div>
            <div class="text-muted fst-italic mb-2">
                <small>{{ dateTime(comment.created_at).fromNow() }}</small>
            </div>
            {{ comment.comment }}
            <template v-for="child in comment.children" :key="child.id">
                <comment-component :comment="child"></comment-component>
            </template>
        </div>
    </div>
</template>
<script>
    import moment from 'moment'
    export default {
        name: "comment-component",
        props: ['comment'],
        methods: {
            getClasses(comment){
                if(comment.children.length === 0){
                    if(comment.parent_id === null){
                        return "d-flex mb-4"
                    }else{
                        return "d-flex mt-4"
                    }
                }else{
                    return "d-flex mt-4"
                }
            },
            dateTime(value) {
                return moment(value)
            }
        }
    }
</script>