{literal}
<style type="text/css">
  label {
    font-size: 1.4em;
    font-weight: bold;
  }
  p {
    margin-bottom: 1em;
  }
</style>
{/literal}

<p>{$emailtemplatelink}</p>
<hr />
<p>
{$form_start}
{$redirect_label}<br />
<span class="small">{$redirect_desc}</span><br />
{$redirect_input}
{$redirect_submit}
{$form_end}
</p>
