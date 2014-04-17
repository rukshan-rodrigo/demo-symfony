<?php

/* GesEnquiryBundle::default_layout.html.twig */
class __TwigTemplate_0c23430f79c04732d96e102269156f7cf0cdc17ff43c831a34fcf28f316c23dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'headJS' => array($this, 'block_headJS'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.css"), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/enquiry.css"), "html", null, true);
        echo "\"/>
    ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 13
        $this->displayBlock('headJS', $context, $blocks);
        // line 14
        echo "</head>
<body>
<div class='container'>
    <div class='header'>GENERAL ENQUIRY SYSTEM</div>
    ";
        // line 18
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 19
            echo "    <div class='navbar navbar-inverse'>
        <div class='navbar-inner nav-collapse'>
            <ul class=\"nav\">
                <li><a href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry"), "html", null, true);
            echo "\">All Enquiries</a></li>
                <li><a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_new"), "html", null, true);
            echo "\">New Enquiry</a></li>
                <li><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_search"), "html", null, true);
            echo "\">Search</a></li>
                ";
            // line 25
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 26
                echo "                    <li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department"), "html", null, true);
                echo "\">Department</a></li>
                    <li><a href=\"";
                // line 27
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquirylevel"), "html", null, true);
                echo "\">Enquiry Level</a></li>
                    <li><a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquirytype"), "html", null, true);
                echo "\">Enquiry Type</a></li>
                    <li><a href=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
                echo "\">Register</a></li>
                ";
            }
            // line 31
            echo "                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_show"), "html", null, true);
            echo "\">Profile</a></li>
                <li><a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\">Logout</a></li>

            </ul>
        </div>
    </div>
    ";
        }
        // line 38
        echo "    <div id='content' class='row-fluid'>
        <div class='span12 main'>
           ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 41
        echo "        </div>
    </div>
</div>
";
        // line 44
        $this->displayBlock('javascripts', $context, $blocks);
        // line 52
        echo "

</body>

</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Ges Enquiry Enquiry Database";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 13
    public function block_headJS($context, array $blocks = array())
    {
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
    }

    // line 44
    public function block_javascripts($context, array $blocks = array())
    {
        // line 45
        echo "    <script>
        function deleteConfirm(){
            return confirm(\"Are you sure you want to delete?\");

        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "GesEnquiryBundle::default_layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 45,  161 => 44,  156 => 40,  151 => 13,  146 => 10,  140 => 6,  132 => 52,  130 => 44,  125 => 41,  123 => 40,  119 => 38,  110 => 32,  105 => 31,  100 => 29,  96 => 28,  92 => 27,  87 => 26,  85 => 25,  81 => 24,  77 => 23,  73 => 22,  68 => 19,  66 => 18,  60 => 14,  58 => 13,  54 => 12,  49 => 11,  47 => 10,  43 => 9,  39 => 8,  35 => 7,  31 => 6,  24 => 1,);
    }
}
