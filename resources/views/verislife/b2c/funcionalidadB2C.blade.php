<script>
	const detalleSuscripcion = JSON.parse(localStorage.getItem('suscripcion'));
	detalleSuscripcion.lineaNegocio = lineaNegocioPage;
	let codigoCliente = detalleSuscripcion.empresa.codigoEmpresa;
	let logoNombre = 'logo-veris.svg';
    if (detalleSuscripcion.lineaNegocio === 'PMF') logoNombre = 'parami.png';
    const logoSrc = `${url_site}/assets/img/veris/${logoNombre}`;
    console.log(4);
    document.addEventListener('DOMContentLoaded', async () => {
        console.log(detalleSuscripcion)
    	await cargarPlanes();

    	$(document).on('click', '.nav-link', async function(){
    		await cargarPlanes();
    	})

    	$('body').on('click', '.btn-continuar-registro', function() {
            let data = JSON.parse($(this).attr('data-rel'));
            let suscripcion = {};
            detalleSuscripcion.detallePlan = data;
            detalleSuscripcion.origen = "suscripcion";
            localStorage.setItem(`suscripcion`, JSON.stringify(detalleSuscripcion));
            if(detalleSuscripcion.tipoFlujo == "C"){
                location.href = '/facturacion-externa';
            }else{
                location.href = '/facturacion-externa-b2c';
            }
        });
    })

    async function cargarPlanes(){
    	let tipo = $('.nav-link.active').attr('tipo-rel');
    	const baseUrl = `${api_url}/empresarial/v1/suscripcion/planes/detalle_empresa`; 
        const queryParams = new URLSearchParams({
            estado: 'ACTIVO',
            frecuencia: tipo,
            contratado: false,
            lineaNegocio: detalleSuscripcion.lineaNegocio,
            codigoCliente: codigoCliente,
            codigoTipoContrato: 34
        });

        const response = await call({
            method: 'GET',
            endpoint: `${baseUrl}?${queryParams.toString()}`,
            bodyType: 'json',
            showLoader: true,
        });

        console.log(response);
        if(response.code == 200){
        	let elem = ``;
        	for (const value of response.data) {
			    const html = (detalleSuscripcion.lineaNegocio == "PMF") 
			        ? await drawCardParaMi(value) 
			        : await drawCardVeris(value);
			    elem += html;
			}


        	{{-- planesMensual --}}
        	$(`#planes${tipo}`).html(elem)
        	let mySwiper = document.querySelector('.my-swiper').swiper;
        	mySwiper.update()
        }
    }

    async function drawCardVeris(detalle){
    	const beneficios = detalle.beneficios || [];
        const beneficiosHTML = beneficios.map((beneficio, index) => {
            const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
            const claseTexto = index === 0 ? 'text-primary-veris' : '';
            return `
                <li class="mb-2 d-flex align-items-start lh-sm">
                    <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                    ${beneficio.descripcion}
                </li>`;
        }).join('');
        let imgFeatured = `${detalle.lineaNegocio}/${detalle.nombre.toLowerCase()}.png`;
    	return `<div class="swiper-slide">
            <div class="card card-transition border-perano-300 rounded-3 shadow-sm p-3 h-100">
    			<img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${detalleSuscripcion.lineaNegocio}" width="128">
                <div class="w-100 box-img-plan rounded" style="background: url(${url_site}/assets/img/veris/planes/${imgFeatured}) no-repeat top center; background-size: cover; height: 165px;"></div>
                <h5 class="bg-zumthor-50 text-blue-zodiac-950 text-capitalize fw-medium text-start px-3 py-3 position-relative rounded" style="margin-top:-25px;">
                    ${capitalizeWords(detalle.nombre)}
                    <div class="position-absolute">
                        <span class="badge rounded-pill bg-blue-ribbon-600 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${detalle.porcentajeDescuento}%</span>
                    </div>
                </h5>
                <div class="px-3 py-2">
                    <div class="my-1">
                        <h2 class="fw-bold text-blue-zodiac-950 m-0">$${detalle.valorFinal} <small class="fw-medium">/${detalle.tipo.toLowerCase()}</small></h2>
                        <small class="text-muted text-decoration-line-through text-xs">PVP: $${detalle.precio}</small>
                    </div>
                </div>
                <hr class="my-1">
                <div class="p-3">
                    <h6 class="fw-bold">Beneficios</h6>
                    <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                        ${beneficiosHTML}
                    </ul>
                    <div class="text-center">
                        {{-- <a href="#!" class="btn btn-blue-veris rounded-3 py-2 w-100">Continuar registro</a> --}}
    					<button type="button" data-rel='${JSON.stringify(detalle)}' class="btn btn-blue-veris rounded-3 py-2 w-100 btn-continuar-registro">Comprar</button>
                    </div>
                </div>
            </div>
        </div>`;
    }

    async function drawCardParaMi(detalle){
    	console.log("PMF")
    	const beneficios = detalle.beneficios || [];
        const beneficiosHTML = beneficios.map((beneficio, index) => {
            const claseIcono = index === 0 ? 'text-primary-veris' : 'text-blue-zodiac-950';
            const claseTexto = index === 0 ? 'text-primary-veris' : '';
            return `
                <li class="mb-2 d-flex align-items-start lh-sm">
                    <i class="bi bi-patch-check-fill ${claseIcono} me-2"></i>
                    ${beneficio.descripcion}
                </li>`;
        }).join('');
        let imgFeatured = `${detalle.lineaNegocio}/${detalle.nombre.toLowerCase()}.png`;
    	return `<div class="swiper-slide">
            <div class="card card-transition border-aquamarine-blue-300 rounded-3 shadow-sm p-3 h-100">
    			<img src="${logoSrc}" class="img-fluid mx-auto mb-3" alt="${detalleSuscripcion.lineaNegocio}" width="128">
                <div class="w-100 box-img-plan rounded" style="background: url(${url_site}/assets/img/veris/planes/${imgFeatured}) no-repeat top center; background-size: cover; height: 165px;"></div>
                <h5 class="bg-vris-onahau-100 text-blue-zodiac-950 fw-medium text-start px-3 py-3 position-relative rounded" style="margin-top:-25px;">
                    ${capitalizeWords(detalle.nombre)}
                    <div class="position-absolute">
                        <span class="badge rounded-pill bg-robin-egg-blue-400 text-white fw-normal" style="font-size: 0.625rem;">AHORRA ${detalle.porcentajeDescuento}%</span>
                    </div>
                </h5>
                <div class="px-3 py-2">
                    <div class="my-1">
                        <h1 class="fw-bold text-blue-zodiac-950 m-0">$${detalle.valorFinal} <small class="fw-medium fs-4 text-capitalize">/${detalle.tipo.toLowerCase()}</small></h1>
                        <small class="text-muted text-decoration-line-through text-xs">PVP: $${detalle.precio}</small>
                    </div>
                </div>
                <hr class="my-1">
                <div class="p-3">
                    <h6 class="fw-bold">Beneficios</h6>
                    <ul class="list-unstyled text-sm text-blue-zodiac-950 mb-3">
                        ${beneficiosHTML}
                    </ul>
                    <div class="text-center">
                        {{-- <a href="#!" class="btn btn-robin-egg-blue-400 rounded-3 py-2 w-100">Continuar registro</a> --}}
    					<button type="button" data-rel='${JSON.stringify(detalle)}' class="btn btn-robin-egg-blue-400 rounded-3 py-2 w-100 btn-continuar-registro">Comprar</button>
                    </div>
                </div>
            </div>
        </div>`;
    }

    function capitalizeWords(str) {
        return str
            .toLocaleLowerCase("es-ES")
            .replace(/(^|\s)\S/g, char => char.toLocaleUpperCase("es-ES"));
    }


</script>