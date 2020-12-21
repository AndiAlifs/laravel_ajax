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
                @{{ nama }}
                <button @click=editName(index)>Edit</button>
                <button @click="removeName(index)">Hapus</button>
            </li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                content: '',
                edit: -1,
                name: ['Muhammad iqbal mubarak', 'Ruby Prwanti', 'Faqih Muhammad']
            },
            methods: {
                addName: function() {
                    if (this.edit != -1){
                        this.name[this.edit] = this.content
                        this.edit = -1
                        this.content = '';
                    } else {
                        this.name.push(this.content),
                        this.content = '';
                    }
                },
                removeName: function (index) {
                    this.name.splice(index, 1);  
                },
                editName: function (index) {
                    this.content = this.name[index]
                    this.edit = index
                }
            }
        })
    </script>
</body>
</html>