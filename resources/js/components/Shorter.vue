<template>
    <div>
        <div class="form-group">
            <label for="inputUrl">Url</label>
            <input type="text" class="form-control" id="inputUrl" placeholder="Enter url" v-model="url">
        </div>
        <button type="submit" class="btn btn-primary" @click="createLink">make short link</button>
        <div class="alert alert-primary mt-3" role="alert" v-if="link">
          {{ short_link }}
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: '',
                link: null,
            }
        },
        computed: {
            short_link() {
                return window.origin + '/' + this.link.short
            }
        },
        methods: {
            createLink() {
                axios.post('/link/store', {url:this.url})
                    .then(({data}) => this.link = data.link)
            }
        }
    }
</script>
