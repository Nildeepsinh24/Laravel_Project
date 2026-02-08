@extends('admin.layouts.app')

@section('title','Categories')

@section('content')
@php $asset = asset('assets'); @endphp

<style>
.premium-header {
    background: linear-gradient(135deg, var(--og-primary), var(--og-primary-strong));
    border-radius: 16px;
    padding: 2rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.premium-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
    border-radius: 50%;
}

.header-title {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    position: relative;
    z-index: 1;
}

.header-subtitle {
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.add-category-btn {
    background: #fff;
    color: var(--og-primary);
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    position: relative;
    z-index: 1;
}

.add-category-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
    color: var(--og-primary-strong);
}

.premium-categories-card {
    background: linear-gradient(135deg, rgba(17, 24, 39, 0.9), rgba(17, 24, 39, 0.7));
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 16px;
    padding: 2rem;
    backdrop-filter: blur(10px);
    animation: fadeInUp 0.5s ease-out;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
}

.category-card {
    background: rgba(20, 184, 166, 0.08);
    border: 1px solid rgba(20, 184, 166, 0.2);
    border-radius: 12px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.category-card:hover {
    background: rgba(20, 184, 166, 0.12);
    border-color: rgba(20, 184, 166, 0.4);
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(20, 184, 166, 0.15);
}

.category-icon {
    font-size: 2.5rem;
    color: var(--og-primary);
    margin-bottom: 0.75rem;
}

.category-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--og-text);
    margin-bottom: 0.5rem;
}

.category-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--og-muted);
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.product-count-badge {
    background: rgba(245, 158, 11, 0.15);
    color: var(--og-accent);
    padding: 0.25rem 0.75rem;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.8rem;
}

.category-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: auto;
}

.action-btn {
    flex: 1;
    background: rgba(20, 184, 166, 0.15);
    color: var(--og-primary);
    border: 1px solid rgba(20, 184, 166, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.action-btn:hover {
    background: rgba(20, 184, 166, 0.25);
    border-color: rgba(20, 184, 166, 0.5);
    color: var(--og-text);
}

.action-btn.delete {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border-color: rgba(239, 68, 68, 0.3);
}

.action-btn.delete:hover {
    background: rgba(239, 68, 68, 0.15);
    border-color: rgba(239, 68, 68, 0.5);
}

.empty-state {
    text-align: center;
    padding: 3rem 1rem;
    color: #9ca3af;
}

.empty-state i {
    font-size: 3rem;
    opacity: 0.3;
    margin-bottom: 1rem;
    display: block;
}

.empty-state span {
    font-size: 0.95rem;
}

.pagination-wrapper {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

.pagination-wrapper .pagination {
    gap: 0.5rem;
}

.pagination-wrapper .page-link {
    background: rgba(20, 184, 166, 0.1);
    border: 1px solid rgba(20, 184, 166, 0.3);
    color: var(--og-primary);
    border-radius: 8px;
    padding: 0.5rem 0.75rem;
    transition: all 0.3s ease;
}

.pagination-wrapper .page-link:hover {
    background: rgba(20, 184, 166, 0.2);
    border-color: rgba(20, 184, 166, 0.5);
    transform: translateY(-2px);
}

.pagination-wrapper .page-item.active .page-link {
    background: var(--og-primary);
    border-color: var(--og-primary);
    color: #fff;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12">
                <div class="premium-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="header-title">Categories Management</h1>
                            <p class="header-subtitle mt-2">Organize your products into categories</p>
                        </div>
                        <a href="{{ route('admin.categories.create') }}" class="add-category-btn">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add Category</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-4">
    <div class="container-fluid">
        <div class="premium-categories-card">
            @if($categories->count() > 0)
            <div class="categories-grid">
                @foreach($categories as $category)
                <div class="category-card">
                    <i class="fas fa-folder category-icon"></i>
                    <h3 class="category-name">{{ $category->name }}</h3>
                    <div class="category-info">
                        <i class="fas fa-box-open" style="color: var(--og-accent);"></i>
                        <span class="product-count-badge">{{ $category->products_count }} Product{{ $category->products_count !== 1 ? 's' : '' }}</span>
                    </div>
                    <div class="category-actions">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="action-btn">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="flex: 1;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete w-100" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $categories->links() }}
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <span>No categories found. Create your first category now!</span>
                <div style="margin-top: 1.5rem;">
                    <a href="{{ route('admin.categories.create') }}" class="add-category-btn" style="margin: 0;">
                        <i class="fas fa-plus-circle"></i> Create Category
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
