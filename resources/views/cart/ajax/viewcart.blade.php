<div class="container">
    <div class="row">
        @if ($items->isEmpty())
            <div class="col-md-12 mx-auto">
                <div class="alert alert-danger"> No Items in Cart.</div>
            </div>
        @else
        <div class="col-md-6 mx-auto">
                <div class="cart-items">
                    @foreach ($items as $item)
                        <div class="cart-item d-flex align-items-center justify-content-between cart-item-{{ $item->id }}">
                            <div class="img_wrapper">
                                <img src="{{ asset('images/backend_images/products/main_image/'.$item->attributes->image) }}">
                            </div>
                            <div class="prod-info">
                                <div class="prod-title">
                                    {{ $item->name }}
                                </div>
                                <div class="prod-variants">
                                    {{ $item->attributes->size }} / {{ $item->attributes->color }}
                                </div>
                                <div class="prod-price">
                                    Rs. {{ $item->price }}
                                </div>
                            </div>
                            <div class="qty-wrapper">
                                <input type="number" class="form-control" value="{{ $item->quantity }}" onchange="updateCart(this)" data-id="{{ $item->id }}" name="cart-qty" min="1" max="10">
                            </div>
                            <div class="prod-remove">
                            <button type="button"  style="font-size: 20px;" id="prod-remove" onclick="removeprod(this);" data-id="{{ $item->id }}"><i class="fa fa-trash-o"></i></button>
                            </div>
                       </div>
                    @endforeach
                </div>
            </div> 
            <div class="col-md-5 mx-auto">
                <div class="cart-subtotal-wrapper clearfix">
                    <span class="float-left">Subtotal</span>
                    <span class="float-right">Rs. {{ $subtotalprice }}</span>
                </div>
                <div class="mt-3">
                    <form method="POST" action="{{ route('user.checkout') }}">
                        @csrf
                        <label>Special Requests</label>
                        <textarea class="form-control" name="checkoutrequest" rows="4"></textarea>
                        <button class="btn essence-btn mt-3" type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        @endif
          
    </div>
</div>