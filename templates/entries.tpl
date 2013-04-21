{literal}
<style type="text/css">
	.pagetable tr.valid {
		background-color: #56C91C;
	}
	.pagetable tr.invalid {
		background-color: #B51215;
	}
	.pagetable td.current {
		width: 100px;
		font-weight:bold;
	}
	table.pagetable td{		
		color:black;
	}
</style>
{/literal}
<table class="pagetable"  style="width:100%" >
  <tr>
    <th></th>
    <th>{$caption_username}</th>
    <th>{$caption_ip}</th>
    <th></th>
  </tr>
{if isset($current)}
<tr class = "current {$current->validated}">
    <td class="current">{$caption_current}</td>
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
    <td></td>
</tr>
 {/foreach}
{/if}
</table>