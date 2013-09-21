{literal}
<style type="text/css">
	.pagetable tr.valid {
		background-color: #56C91C;
	}
	.pagetable tr.invalid {
		background-color: #B51215;
	}
	.pagetable th.current {
		width: 100px;
		font-weight:bold;
	}
	.pagetable th.action {
		width: 100px;
	}
	table.pagetable td{
		color:black;
	}
</style>
{/literal}
<p>{$emailtemplatelink}</p>
<table class="pagetable"  style="width:100%" >
  <tr>
    <th class="current"></th>
    <th>{$caption_username}</th>
    <th>{$caption_ip}</th>
    <th class="action">{$caption_actions}</th>
  </tr>
{if isset($current)}
<tr class = "current {$current->validated}">
    <td>{$caption_current}</td>
    <td>{$current->username}</td>
    <td>{$current->ip}</td>
    <td></td>
</tr>
{/if}
{if $entries|@count > 0}
{foreach from=$entries item=entry}
<tr class = "{$entry->validated}">
    <td></td>
    <td>{$entry->username}</td>
    <td>{$entry->ip}</td>
    <td>{$entry->validationAction}</td>
</tr>
 {/foreach}
{/if}
</table>