{% extends "base.html" %}

{% block title %}Home{% endblock %}

{% block body %}
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <h1>Welcome</h1>
    <p>Hello from a Twig template, {{ name }}!</p>

    <ul>
        {% for colour in colours %}
            <li>{{ colour }}</li>
        {% endfor %}
    </ul>

    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name = "title">
            </div>

            <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name = "content">
            </div>

            <div style = "width:350px">

                <textarea name="editor1" ></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
            </div>
                <div class="form-group">
                    <label>Post Code</label>
                    <input type="submit" class="form-control" name = "name">
            </div>
       
        </form>

        <div class="form-group">
            <div class="row">
            
                <table border = "1">
                    <tr>
                        <thead>
                            <th>no</th>
                        <th>title</th>
                        <th>content</th></thead>
                    </tr>
                    
                        <tbody>
                        
                            <?php foreach($posts as $key=>$post): ?>
                            <tr>
                            <td><?php echo $key +1 ; ?></td>
                            <td><?php echo $post['title'] ?></td>
                            <td><?php echo $post['content'] ?></td>
                            </tr>
                            <?php endforeach ?>
                   
                    </tbody>

                            <!-- {% for post in posts %}
                            <tr>    
                            <td>{{1}}</td>
                            <td>{{ post['title'] }}</td>
                            <td>{{ post['content'] }}</td></tr>
                           
                            {% endfor %} -->
                        
                </table>
            </div>
        </div>
    </div>

{% endblock %}
