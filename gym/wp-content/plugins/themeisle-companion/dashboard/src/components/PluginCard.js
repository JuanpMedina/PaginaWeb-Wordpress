import { DashboardContext, PluginsContext } from './DashboardContext';
import { get } from '../utils/rest';
import classnames from 'classnames';

import { Button, Dashicon, ExternalLink } from '@wordpress/components';
import { useContext, useState } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const PluginCard = ({ slug, data }) => {
	const { banner, name, description, version, author, url, premium } = data;
	const { pluginsData, setPluginsData } = useContext(PluginsContext);
	const { setToast } = useContext(DashboardContext);
	const [inProgress, setInProgress] = useState(false);
	const pluginState = pluginsData[slug].action;

	const setPluginState = (newStatus) => {
		pluginsData[slug].action = newStatus;
		setPluginsData(pluginsData);
	};

	const errorMessage = __(
		'Something went wrong. Please try again.',
		'themeisle-companion'
	);

	const stringMap = {
		install: {
			static: __('Install', 'themeisle-companion'),
			progress: __('Installing', 'themeisle-companion'),
		},
		activate: {
			static: __('Activate', 'themeisle-companion'),
			progress: __('Activating', 'themeisle-companion'),
		},
		deactivate: {
			static: __('Deactivate', 'themeisle-companion'),
			progress: __('Deactivating', 'themeisle-companion'),
		},
		external: __('See more details', 'themeisle-companion'),
	};

	const handleActionButton = () => {
		setInProgress(true);
		if ('install' === pluginState) {
			installPlugin(slug).then((r) => {
				if (!r.success) {
					setInProgress(false);
					setToast(errorMessage);
					return;
				}
				setPluginState('activate');
				setInProgress(false);
			});
			return;
		}

		get(data[pluginState], true).then((r) => {
			if (!r.ok) {
				setInProgress(false);
				setToast(errorMessage);
				return;
			}

			if ('activate' === pluginState) {
				setPluginState('deactivate');
			} else {
				setPluginState('activate');
			}

			setInProgress(false);
		});
	};

	return (
		<div className={classnames(['card', 'plugin', slug])}>
			<div className="card-header">
				<img src={banner} alt={__('Banner Image', 'name')} />
				{premium && (
					<span className="premium-label">{__('Premium', 'themeisle-companion')}</span>
				)}
			</div>
			<div className="card-body">
				<h3 className="card-title">{name}</h3>
				<p className="card-description">{description}</p>
			</div>
			<div className="card-footer">
				<div className="plugin-data">
					{version && <span className="version">v{version}</span>}
					{author && <span className="author">{author}</span>}
				</div>
				{pluginState !== 'external' && (
					<Button
						className="plugin-action"
						isPrimary={['install', 'activate'].includes(
							pluginState
						)}
						isSecondary={pluginState === 'deactivate'}
						disabled={inProgress}
						onClick={handleActionButton}
					>
						{!inProgress && stringMap[pluginState].static}
						{inProgress && (
							<span
								style={{
									display: 'flex',
									alignItems: 'center',
								}}
							>
								<Dashicon icon="update" />
								{stringMap[pluginState].progress + '...'}
							</span>
						)}
					</Button>
				)}
				{pluginState === 'external' && (
					<ExternalLink href={url}>
						{stringMap[pluginState]}
					</ExternalLink>
				)}
			</div>
		</div>
	);
};

const installPlugin = (slug) => {
	return new Promise((resolve) => {
		wp.updates.ajax('install-plugin', {
			slug,
			success: () => {
				resolve({ success: true });
			},
			error: () => {
				resolve({ success: false });
			},
		});
	});
};

export default PluginCard;
