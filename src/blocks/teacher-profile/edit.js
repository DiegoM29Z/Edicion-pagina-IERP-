/**
 * Retrieves the translation of text.
 */
import { __ } from '@wordpress/i18n';

/**
 * React hooks and components
 */
import {
	InspectorControls,
	useBlockProps,
	BlockControls,
	AlignmentToolbar,
} from '@wordpress/block-editor';

import {
	PanelBody,
	Flex,
	FlexItem,
	Spinner,
	RangeControl,
	SelectControl,
	ToggleControl,
	ToolbarGroup,
	ToolbarButton,
} from '@wordpress/components';


/**
 * Icons
 */
import { Mail, FilePen, GraduationCap, Eye } from 'lucide-react';

/**
 * Styles
 */
import './editor.scss';

import { useSelect } from '@wordpress/data';
import { store as coreDataStore } from '@wordpress/core-data';

export default function Edit({ attributes, setAttributes }) {
	const {
		// Espaciado
		gap = 4,
		
		// Avatar
		avatarSize = 128,
		avatarRounded = 'lg',
		avatarBorder = true,
		
		// Layout
		direction = 'horizontal',
		alignment = 'start',
		
		// Tipografía
		nameSize = 'text-lg',
		nameWeight = 'font-normal',
		showEmail = true,
		showSubject = true,
		showTitle = true,
		
		// Efectos
		hoverEffect = false,
	} = attributes;

	const { currentUser, isResolving, hasTeacherRole } = useSelect((select) => {
		const { getCurrentUser, getEntityRecord, hasFinishedResolution } = select(coreDataStore);
		const cuser = getCurrentUser();
		const user = cuser ? getEntityRecord('root', 'user', cuser.id) : null;
		const isResolving = !cuser || !hasFinishedResolution('getEntityRecord', ['root', 'user', cuser?.id]);

		return {
			currentUser: user ? {
				...user,
				avatar: user.avatar_urls?.[96] || '',
				subject: user.meta?.subject    || '',
				title: user.meta?.title        || '',
			} : null,
			isResolving,
			hasTeacherRole: user?.roles?.includes('profesor_role') || false,
		};
	}, []);

	// Estados de carga
	if (isResolving) {
		return (
			<div {...useBlockProps()}>
				<div className="flex items-center gap-2 p-4 bg-white rounded-lg border border-border-light dark:border-border-dark">
					<Spinner /> 
					<span className="text-text-light dark:text-text-dark">{__('Cargando información del profesor...', 'edusiteco')}</span>
				</div>
			</div>
		);
	}

	if (!currentUser) {
		return (
			<div {...useBlockProps()}>
				<div className="p-6 bg-red-50 border border-red-200 rounded-lg">
					<p className="text-red-600 text-center">
						{__('No se pudo cargar la información del usuario.', 'edusiteco')}
					</p>
				</div>
			</div>
		);
	}

	if (!hasTeacherRole) {
		return (
			<div {...useBlockProps()}>
				<div className="p-6 bg-yellow-50 border border-yellow-200 rounded-lg">
					<p className="text-yellow-700 text-center">
						{__('Este bloque solo está disponible para usuarios con el rol de Profesor.', 'edusiteco')}
					</p>
				</div>
			</div>
		);
	}

	// Clases dinámicas con estilos del tema
	const avatarClasses = [
		`rounded-${avatarRounded}`,
		'object-cover',
		'm-0',
		avatarBorder ? 'border-2 border-brand-primary' : '', // Usar color primario del tema
	].filter(Boolean).join(' ');

	const containerClasses = [
		'bg-white',
		'dark:bg-gray-800',
		'border',
		'border-border-light',
		'dark:border-border-dark',
		'shadow-md',
		'rounded-lg',
		'p-6',
		hoverEffect ? 'transition-all duration-300 hover:shadow-lg' : '',
	].filter(Boolean).join(' ');

	const blockProps = useBlockProps({
		className: 'edusiteco-teacher-profile-block',
	});

	return (
		<>
			{/* Barra de herramientas superior */}
			<BlockControls>
				<ToolbarGroup>
					<ToolbarButton
						icon="align-pull-left"
						label={__('Horizontal', 'edusiteco')}
						isActive={direction === 'horizontal'}
						onClick={() => setAttributes({ direction: 'horizontal' })}
					/>
					<ToolbarButton
						icon="align-center"
						label={__('Vertical', 'edusiteco')}
						isActive={direction === 'vertical'}
						onClick={() => setAttributes({ direction: 'vertical' })}
					/>
				</ToolbarGroup>
			</BlockControls>

			{/* Panel lateral de configuración */}
			<InspectorControls>
				{/* LAYOUT */}
				<PanelBody title={__('📐 Diseño', 'edusiteco')} initialOpen={true}>
					<SelectControl
						label={__('Dirección', 'edusiteco')}
						value={direction}
						options={[
							{ label: __('Horizontal (→)', 'edusiteco'), value: 'horizontal' },
							{ label: __('Vertical (↓)', 'edusiteco'), value: 'vertical' },
						]}
						onChange={(value) => setAttributes({ direction: value })}
						help={__('Disposición del avatar y la información', 'edusiteco')}
					/>
					
					<SelectControl
						label={__('Alineación', 'edusiteco')}
						value={alignment}
						options={[
							{ label: __('Inicio', 'edusiteco'), value: 'start' },
							{ label: __('Centro', 'edusiteco'), value: 'center' },
							{ label: __('Fin', 'edusiteco'), value: 'end' },
							{ label: __('Espacio entre', 'edusiteco'), value: 'space-between' },
						]}
						onChange={(value) => setAttributes({ alignment: value })}
					/>
					
					<RangeControl
						label={__('Espaciado (Gap)', 'edusiteco')}
						value={gap}
						onChange={(value) => setAttributes({ gap: value })}
						min={0}
						max={16}
						step={1}
						help={__('Espacio entre el avatar y la información', 'edusiteco')}
					/>
					
					<ToggleControl
						label={__('Efecto hover', 'edusiteco')}
						checked={hoverEffect}
						onChange={(value) => setAttributes({ hoverEffect: value })}
						help={__('Añade una animación sutil al pasar el mouse', 'edusiteco')}
					/>
				</PanelBody>

				{/* AVATAR */}
				<PanelBody title={__('👤 Avatar', 'edusiteco')} initialOpen={false}>
					<RangeControl
						label={__('Tamaño (px)', 'edusiteco')}
						value={avatarSize}
						onChange={(value) => setAttributes({ avatarSize: value })}
						min={64}
						max={256}
						step={8}
					/>
					
					<SelectControl
						label={__('Forma', 'edusiteco')}
						value={avatarRounded}
						options={[
							{ label: __('🔲 Cuadrado', 'edusiteco'), value: 'none' },
							{ label: __('📐 Esquinas suaves', 'edusiteco'), value: 'sm' },
							{ label: __('🔷 Redondeado', 'edusiteco'), value: 'lg' },
							{ label: __('⭕ Circular', 'edusiteco'), value: 'full' },
						]}
						onChange={(value) => setAttributes({ avatarRounded: value })}
					/>
					
					<ToggleControl
						label={__('Mostrar borde', 'edusiteco')}
						checked={avatarBorder}
						onChange={(value) => setAttributes({ avatarBorder: value })}
					/>
				</PanelBody>

				{/* TIPOGRAFÍA */}
				<PanelBody title={__('✍️ Tipografía', 'edusiteco')} initialOpen={false}>
					<SelectControl
						label={__('Tamaño del nombre', 'edusiteco')}
						value={nameSize}
						options={[
							{ label: __('Pequeño', 'edusiteco'), value: 'text-sm' },
							{ label: __('Base', 'edusiteco'), value: 'text-base' },
							{ label: __('Grande', 'edusiteco'), value: 'text-lg' },
							{ label: __('Extra grande', 'edusiteco'), value: 'text-xl' },
							{ label: __('2XL', 'edusiteco'), value: 'text-2xl' },
							{ label: __('3XL', 'edusiteco'), value: 'text-3xl' },
						]}
						onChange={(value) => setAttributes({ nameSize: value })}
					/>
					
					<SelectControl
						label={__('Grosor del nombre', 'edusiteco')}
						value={nameWeight}
						options={[
							{ label: __('Normal', 'edusiteco'), value: 'font-normal' },
							{ label: __('Medium', 'edusiteco'), value: 'font-medium' },
							{ label: __('Semibold', 'edusiteco'), value: 'font-semibold' },
							{ label: __('Bold', 'edusiteco'), value: 'font-bold' },
							{ label: __('Extrabold', 'edusiteco'), value: 'font-extrabold' },
						]}
						onChange={(value) => setAttributes({ nameWeight: value })}
					/>
				</PanelBody>

				{/* CONTENIDO VISIBLE */}
				<PanelBody icon={ <Eye width={16} className='bg-brand-primary' /> } title={__('Información visible', 'edusiteco')} initialOpen={false}>
					<ToggleControl
						label={__('Mostrar correo electrónico', 'edusiteco')}
						checked={showEmail}
						onChange={(value) => setAttributes({ showEmail: value })}
					/>
					
					<ToggleControl
						label={__('Mostrar asignatura', 'edusiteco')}
						checked={showSubject}
						onChange={(value) => setAttributes({ showSubject: value })}
					/>
					
					<ToggleControl
						label={__('Mostrar título profesional', 'edusiteco')}
						checked={showTitle}
						onChange={(value) => setAttributes({ showTitle: value })}
					/>
					
					{!showEmail && !showSubject && !showTitle && (
						<p style={{ 
							color: '#d63638', 
							fontSize: '12px', 
							marginTop: '8px',
							padding: '8px',
							background: '#fef2f2',
							borderRadius: '4px'
						}}>
							⚠️ {__('Debes mostrar al menos un campo de información', 'edusiteco')}
						</p>
					)}
				</PanelBody>
			</InspectorControls>

			{/* Renderizado del bloque con estilos del tema */}
			<div {...blockProps}>
				<div className={containerClasses}>
					<Flex
						gap={gap}
						justify={alignment}
						direction={direction === 'vertical' ? 'column' : 'row'}
						align={direction === 'vertical' ? 'center' : 'flex-start'}
					>
						<FlexItem>
							<img
								width={avatarSize}
								height={avatarSize}
								src={currentUser.avatar}
								alt={`${__('Avatar de', 'edusiteco')} ${currentUser.name}`}
								className={avatarClasses}
								style={{ display: 'block' }}
							/>
						</FlexItem>
						
						<FlexItem className="min-w-0">
							<h3 
								className={`${nameSize} ${nameWeight} text-text-light dark:text-text-dark mb-2`}
								style={{ margin: '0 0 0.5rem 0' }}
							>
								{currentUser.name || __('Sin nombre', 'edusiteco')}
							</h3>

							<div className="flex flex-col gap-1 text-base text-gray-600 dark:text-gray-400">
								{showEmail && currentUser.email && (
									<p className="text-base">
										<Mail width={32} className='inline-flex'/> <strong> {__('Correo:', 'edusiteco')}</strong> {currentUser.email}
									</p>
								)}
								
								{showSubject && currentUser.subject && (
									<p className="text-base">
										<FilePen width={32} className='inline-flex'/> <strong>{__('Asignatura:', 'edusiteco')}</strong> {currentUser.subject}
									</p>
								)}
								
								{showTitle && currentUser.title && (
									<p sclassName="text-base">
										<GraduationCap width={32} className='inline-flex'/> <strong>{__('Título:', 'edusiteco')}</strong> {currentUser.title}
									</p>
								)}
								
								{!showEmail && !showSubject && !showTitle && (
									<p style={{ 
										margin: 0, 
										fontSize: '0.875rem',
										color: '#d63638',
										fontStyle: 'italic'
									}}>
										{__('No hay información visible. Activa al menos un campo.', 'edusiteco')}
									</p>
								)}
							</div>
						</FlexItem>
					</Flex>
				</div>
			</div>
		</>
	);
}