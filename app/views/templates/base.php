<!Doctype html>
<html lang="en">
<head>
<!--
    Website.com
-->

    <!-- Metadata - static -->
    {% block metadata_main %}
        {% include 'templates/metadata/main.php' %}
    {% endblock %}

    <!-- Metadata - dynamic -->
    {% block metadata %}{% endblock %}

    <!-- CSS static -->
    {% block css_main %}
        {% include 'templates/css/main.php' %}
    {% endblock %}

    <!-- CSS - dynamic -->
    {% block css %}{% endblock %}

    <!-- Javascript Header - static -->
    {% block javascript_header_main %}
        {% include 'templates/js/header.php' %}
    {% endblock %}

    <!-- Javascript Header - dynamic -->
    {% block javascript_header %}{% endblock %}

</head>
<body class="app-body">


    <!-- Header -->
    {% block header %}
        {% include 'templates/header/header.php' %}
    {% endblock %}



    <!-- Body Container -->
    {% block body_container %}
    <div class="app-body-container">

        {% block left_nav %}
            <!-- Add include here for all left navs -->
        {% endblock %}

        <!-- Body -->
        {% block body %}{% endblock %}

    </div>
    {% endblock %}



    <!-- Footer -->
    {% block footer %}
        {% include 'templates/footer/footer.php' %}
    {% endblock %}

    <!-- Javascript - static -->
    {% block javascript_main %}
        {% include 'templates/js/main.php' %}
    {% endblock %}

    <!-- Javascript - dynamic -->
    {% block javascript %}{% endblock %}

</body>
</html>
