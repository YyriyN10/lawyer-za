/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps, RichText, MediaUpload, MediaUploadCheck} from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';


// беремо enum прямо з block.json
import metadata from './block.json';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
/*import '../main-block/editor.scss';*/

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { blockText, anchorId, topIndent, bottomIndent, pageId, btnTargetType, btnText, btnAnchor, btnColor, imageUrl, imageId, imageAlt} = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});


	// Отримуємо enum bottomIndent з block.json
	const bottomIndentOptions = metadata.attributes.bottomIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum topIndent з block.json
	const topIndentOptions = metadata.attributes.topIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum btnColor з block.json
	const btnColorOptions = metadata.attributes.btnColor.enum.map((value) => ({
		label: value,
		value: value,
	}));

	//Select image
	const onSelectImage = (media) => {
		setAttributes({
			imageUrl: media?.url || '',
			imageId: media?.id || 0,
			imageAlt: media?.alt || '',
		});
	};

	// Отримуємо сторінку призначення
	const pagesList = useSelect(
		(select) => select('core').getEntityRecords('postType', 'page', { per_page: -1 }),
		[]
	);

	const pagesListOptions = pagesList
		? pagesList.map((page) => ({ label: page.title.rendered, value: page.id }))
		: [];

	pagesListOptions.unshift({ label: __('Виберіть сторінку призначкення', ), value: 0 });



	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >

					<TextControl
						label={'Якір блоку'}
						help={'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо'}
						value={ anchorId || ''}
						onChange={ (value)=> setAttributes({ anchorId: value })}
					/>
					<SelectControl
						label={__('Верхній внутрішній відступ')}
						value={topIndent}
						options={topIndentOptions}
						onChange={(value) => setAttributes({ topIndent: value })}
					/>

					<SelectControl
						label={__('Нижній внутрішній відступ')}
						value={bottomIndent}
						options={bottomIndentOptions}
						onChange={(value) => setAttributes({ bottomIndent: value })}
					/>

				</PanelBody>
				<PanelBody title={'Кнопка'}  >
					<SelectControl
						label={__('Призначення кнопки', 'yuna')}
						value={btnTargetType}
						onChange={(value) => {
							setAttributes({ btnTargetType: value });
							// очищаємо зайвий стан
							if (value === 'page') {
								setAttributes({ btnAnchor: '' });
							} else {
								setAttributes({ pageId: 0 });
							}
						}}
						options={[
							{ label: __('Модальне вікно', 'yuna'), value: 'modal' },
							{ label: __('Блок на сайті', 'yuna'), value: 'block' },
							{ label: __('Сторінка сайту', 'yuna'), value: 'page' },
						]}
					/>

					<SelectControl
						label={__('Колір кнопки')}
						value={btnColor}
						options={btnColorOptions}
						onChange={(value) => setAttributes({ btnColor: value })}
					/>

					<TextControl
						label={'Текст кнопки'}
						value={ btnText || ''}
						onChange={ (value)=> setAttributes({ btnText: value })}
					/>
					{/* Показуємо ID якоря лише для modal|block */}
					{(btnTargetType === 'modal' || btnTargetType === 'block') && (
						<TextControl
							label={__('ID якоря', 'yuna')}
							help={__('ID блоку чи модалки (напр.: formModal або contact-form).', 'yuna')}
							value={btnAnchor || ''}
							onChange={(value) => setAttributes({ btnAnchor: value })}
						/>
					)}

					{/* Показуємо вибір сторінки лише для page */}
					{btnTargetType === 'page' && (
						<SelectControl
							label={__('Оберіть сторінку призначення', 'yuna')}
							value={pageId}
							options={[
								{ label: __('Виберіть сторінку призначення', 'yuna'), value: 0 },
								...(pagesList
									? pagesList.map((p) => ({ label: p.title.rendered, value: p.id }))
									: []),
							]}
							onChange={(value) => setAttributes({ pageId: parseInt(value, 10) || 0 })}
						/>
					)}
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<div className="image-block">
							{imageUrl ? (
								<img src={imageUrl} alt={imageAlt} style={{ maxWidth: '50%' }} />
							) : (
								<p>Зображення не вибрано</p>
							)}

							<MediaUploadCheck>
								<MediaUpload
									onSelect={onSelectImage}
									allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
									render={({ open }) => (
										<Button onClick={open} variant="primary">
											{imageUrl ? 'Змінити зображення' : 'Завантажити зображення'}
										</Button>
									)}
								/>
							</MediaUploadCheck>
						</div>
						<RichText
							tagName="p"
							className={'block-text'}
							value={ attributes.blockText }
							placeholder={'Текст блоку'}
							onChange={ (value)=>setAttributes({ blockText: value })}
							allowedFormats={ [ 'core/bold', 'core/link', 'core/text-color' ] }
						/>
					</div>
				</div>
			</section>
		</>
	);
}
