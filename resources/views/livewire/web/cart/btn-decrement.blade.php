<input type="button" value="-" wire:click="decrement({{ $id, $id_produk }})" @if($disabled <= 1) disabled @endif class="button-minus border-0 rounded-circle icon-shape icon-sm mx-1" data-field="quantity">


