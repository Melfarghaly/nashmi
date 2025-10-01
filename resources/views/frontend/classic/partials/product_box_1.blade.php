@php
    $cart_added = [];
    $product_url = route('product', $product->slug);
    if ($product->auction_product == 1) {
        $product_url = route('auction-product', $product->slug);
    }
@endphp

<div class="card border shadow-sm rounded text-center p-3 h-100 position-relative">

    <!-- أيقونة المفضلة أعلى اليمين -->
    <div class="position-absolute top-0 end-0 p-2">
        <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})" class="text-dark">
            <i class="la la-heart fs-20"></i>
        </a>
    </div>

    <!-- صورة المنتج -->
    <a href="{{ $product_url }}" class="d-block mb-3">
        <img src="{{ get_image($product->thumbnail) }}"
             onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
             alt="{{ $product->getTranslation('name') }}"
             class="img-fluid mx-auto d-block"
             style="max-height: 140px; object-fit: contain;">
    </a>

    <!-- اسم المنتج -->
    <h6 class="fs-14 text-truncate mb-1" style="height: 40px;">
        {{ Str::limit($product->getTranslation('name'), 40) }}
    </h6>

    <!-- كود المنتج -->
    <div class="mb-2">
        <span class="badge bg-light text-muted">{{ $product->code ?? 'v700M1001' }}</span>
    </div>

    <!-- التقييم -->
    <div class="mb-1 text-warning">
        <span class="fw-bold fs-13">4.9</span>
        @for ($i = 0; $i < 5; $i++)
            <i class="la la-star"></i>
        @endfor
    </div>

    <!-- السعر -->
    <div class="mb-1">
        <strong class="fs-16 text-dark">{{ home_discounted_base_price($product) }}</strong>
        <span class="fs-13 text-muted">دينار اردني</span>
    </div>

    <!-- كود خاص -->
    <div class="mb-3 text-muted fs-13">vc:{{ $product->sku ?? '98127643' }}</div>

    <!-- زر الإضافة للسلة -->
    <a href="javascript:void(0)"
       onclick="showAddToCartModal({{ $product->id }})"
       class="btn btn-primary w-100 rounded fw-bold py-2">
        أضف الى السلة
    </a>
</div>
