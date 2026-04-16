<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="#hero" class="logo d-flex align-items-center">
                    <span class="sitename">{{ $siteSetting->site_name ?? 'Fab-Technology' }}</span>
                </a>
                <div class="footer-contact pt-3">
                    <p style="text-align: justify;">{{ $siteSetting->site_description ?? __('app.footer_description') }}</p>
                </div>
                @if($socialLinks->isNotEmpty())
                <div class="social-links d-flex mt-4">
                    @foreach($socialLinks as $link)
                    <a href="{{ $link->url }}" target="_blank" title="{{ ucfirst($link->platform) }}">
                        <i class="bi {{ $link->icon ?? 'bi-link' }}"></i>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>{{ __('app.useful_links') }}</h4>
                <ul>
                    @foreach($menus as $menu)
                    <li><a href="{{ $menu->url }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>{{ __('app.our_contacts') }}</h4>
                @foreach($footerInfos as $info)
                <div class="mb-4">
                    @if($info->address)
                    <p>{{ $info->address }}</p>
                    @endif
                    @if($info->phone)
                    <p class="mt-2">
                        <strong>{{ __('app.phone_number') }}</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', $info->phone) }}"><span>{{ $info->phone }}</span></a>
                    </p>
                    @endif
                    @if($info->email)
                    <p>
                        <strong>{{ __('app.email') }}:</strong> <a href="mailto:{{ $info->email }}"><span>{{ $info->email }}</span></a> 
                    </p>
                    @endif
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ date('Y') }}</strong> <span>{{ __('app.all_rights_reserved') }}</span>
        </p>
        <div class="credits">
            Developed by <a href="#">{{ $siteSetting->site_name ?? 'Fab-Technology' }}</a>
        </div>
    </div>

</footer>
