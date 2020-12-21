<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel vue ajax</title>
</head>
<body>
    <div id="app">
        <input type="text" v-model='content'>
        <button @click="addName">Add</button>
        <ul>
            <li v-for="(nama,index) in name">
                @{{ nama.name }}
                <button @click=editName(index)>Edit</button>
                <button @click="removeName(index)">Hapus</button>
            </li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                content: '',
                edit: -1,
                name: [],
                length: 0
            },
            methods: {
                addName: function() {
                    if (this.edit != -1){
                        this.name[this.edit] = this.content
                        this.edit = -1
                        this.content = '';
                    } else {
                        this.$http.post('/api/add_user', {name: this.content}).then(response => {
                            this.length += 1,
                            this.name.push({id: this.length, name: this.content}),
                            this.content = ''
                        })
                    }
                },
                removeName: function (index) {
                    this.name.splice(index, 1);  
                },
                editName: function (index) {
                    this.content = this.name[index]
                    this.edit = index
                }
            },
            mounted: function(){
                // GET /someUrl
                this.$http.get('/api/get_user').then(response => {

                    let result = response.body.data
                    this.name = result
                    this.length = result.length + 1
                    console.log(result);

                });
            }
        })
    </script>
</body>
</html>