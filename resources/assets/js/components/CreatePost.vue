<template>
    <div>
        <div class="alert alert-success" v-if="saved">
            <strong>Success!</strong> Your Post has been saved successfully.
        </div>

        <div class="well well-sm" id="post-form">
            <form class="form-horizontal" method="post" @submit.prevent="onSubmit">
                <fieldset>
                    <legend class="text-center">Create a Post</legend>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="title">Title</label>
                        <div class="col-md-9" :class="{'has-error': errors.title}">
                            <input id="title"
                                   v-model="post.title"
                                   type="text"
                                   placeholder="Title"
                                   class="form-control">
                            <span v-if="errors.title" class="help-block text-danger">{{ errors.title[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="body">Your post</label>
                        <div class="col-md-9" :class="{'has-error': errors.body}">
                                    <textarea class="form-control"
                                              id="body"
                                              v-model="post.body"
                                              placeholder="Please enter your message here..."
                                              rows="1"></textarea>
                            <span v-if="errors.body" class="help-block text-danger">{{ errors.body[0] }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                errors: [],
                saved: false,
                post: {
                    title: null,
                    body: null,
                }
            };
        },

        methods: {
            onSubmit() {
                this.saved = false;

                axios.post('api/posts', this.post)
                    .then(({data}) => this.setSuccessMessage())
                    .catch(({response}) => this.setErrors(response));
            },

            setErrors(response) {
                this.errors = response.data.errors;
            },

            setSuccessMessage() {
                this.reset();
                this.saved = true;
            },

            reset() {
                this.errors = [];
                this.post = {title: null, body: null};
            }
        }
    }
</script>