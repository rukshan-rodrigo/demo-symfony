<?php

/* GesEnquiryBundle:Enquiry:index.html.twig */
class __TwigTemplate_7d2bb137aac61e0885c81962a7ac1b2ae46e29a13c95af0e5453288ba6699cd0 extends Twig_Template
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
        echo "<h1>Enquiry list</h1>
    <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_new"), "html", null, true);
        echo "\" class=\"btn\">
        Report a new Enquiry
    </a>
    <table class=\"table table-striped\">
        <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Enquiry Type</th>
            <th>Enquiry Level</th>
            <th>Department</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 22
            echo "            <tr>
                <td>";
            // line 23
            if ($this->getAttribute($this->getContext($context, "entity"), "enquirydate")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirydate"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "familyname"), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "firstname"), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirytypeid"), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirylevelid"), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "departmentid"), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            if (($this->getAttribute($this->getContext($context, "entity"), "isapproved") == 0)) {
                echo "Pending";
            }
            if (($this->getAttribute($this->getContext($context, "entity"), "isapproved") == 1)) {
                echo "Approved";
            }
            echo "</td>
                <td>
                    <a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">View</a> | <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">Edit</a>
                </td>
            </tr>
            <tr>
                <td colspan=\"8\"><em>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "description"), "html", null, true);
            echo "</em></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "        </tbody>
    </table>
    ";
        // line 40
        echo "    <div class=\"navigation\">
        ";
        // line 41
        echo $this->env->getExtension('knp_pagination')->render($this->getContext($context, "entities"));
        echo "
    </div>
";
    }

    public function getTemplateName()
    {
        return "GesEnquiryBundle:Enquiry:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 41,  116 => 40,  112 => 37,  103 => 34,  94 => 30,  84 => 28,  80 => 27,  76 => 26,  72 => 25,  66 => 24,  60 => 23,  57 => 22,  53 => 21,  34 => 5,  31 => 4,  28 => 3,);
    }
}
