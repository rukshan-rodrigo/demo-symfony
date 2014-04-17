<?php

/* GesEnquiryBundle:Enquiry:new.html.twig */
class __TwigTemplate_c771f3347a669811074dbd2ff47f9a42c0d74bb83c82d5fec120a086287078f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GesEnquiryBundle::default_layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GesEnquiryBundle::default_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Enquiry creation</h1>
    <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry"), "html", null, true);
        echo "\" class=\"btn\">
        Back to the list
    </a>
    <hr>
    <form action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_create"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
        ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        <p>
            <button type=\"submit\" class=\"btn\">Create Enquiry</button>
        </p>
    </form>

";
    }

    public function getTemplateName()
    {
        return "GesEnquiryBundle:Enquiry:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  41 => 9,  34 => 5,  31 => 4,  28 => 3,);
    }
}
